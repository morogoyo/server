<?php

use WorkHorse\View;
use WorkHorse\Spintax;
use WorkHorse\Storage;
use WorkHorse\LiteSpintax;
use WorkHorse\Models\Task;
use WorkHorse\Models\Lists;
use WorkHorse\ChannelManager;
use WorkHorse\Models\Shortcode;

function workhorse_builder() {
	global $wpdb;
	global $wp_rewrite;

	// remove_all_actions('wp_head');
	// remove_all_actions('wp_footer');

	ob_start();
	ignore_user_abort(true);
	@set_time_limit(0);
	session_write_close();

	workhorse_debug_start();

	ini_set("pcre.backtrack_limit", "23001337");
	ini_set("pcre.recursion_limit", "23001337");

	$id = $_GET['id'];

	if (!$id) {
		echo '<h3>Please, build posts/pages from <a href="/wp-admin/admin.php?page=workhorse_projects">projects list.</a></h3>';
		return;
	}

	$model = new Task();
	$model->update(array('deleted_at' => '0000-00-00 00:00:00'), $id);

	$project = $model->find($id);

	$options = $project->options;
	$posts = 1;
	$geo = isset($options['local_geo_country']);
	if ($geo) {
		$geoIterations = sizeof($options['local_geo_locations']);
	}

	$post_date = date('Y-m-d H:i:s');

	// Use Dripfeed
	if (isset($options['dripfeed_type'])) {
		switch ($options['dripfeed_type']) {
			case 'per-day':
				$per_day = $options['dripfeed_x'];
				break;
			case 'over-days':
				$per_day = ceil($project->max_iterations / $options['dripfeed_x']);
				break;
		}
	} else {
		$per_day = $project->max_iterations;
	}

	$data = $project->content;

	$title = $data['title'];
	$content = $data['content'];

	$titleSpintax = Spintax::parse($data['title']);
	$titleMax = Spintax::count($titleSpintax);

	//$contentSpintax = Spintax::parse($content);
	//$contentMax = Spintax::count($contentSpintax);

	$posts = $project->max_iterations;

	if (isset($options['exif_locations'])) {
		$options['exif_locations'] = str_replace('\"', '"', $options['exif_locations']);

		$exifLocations = json_decode($options['exif_locations']);
	}

	$start_date = new DateTime();
	$current_per_day = 0;

	$step = 100;
	$current_post = 0;

	$storage = new Storage('workhouse');

	// Authors
	if ($options['distribute']) {
		$_authors = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}usermeta WHERE meta_key = 'workhorse_user' ORDER BY RAND() LIMIT 500");
		foreach ($_authors as $a) {
			$authors[] = $a->user_id;
		}
		shuffle($authors);
	}

	// Permalink prefix
	if (isset($options['permalink_prefix'])) {
		$prefixes = $storage->permalink_prefixes;

		if (!isset($prefixes[$options['permalink_prefix']])) $prefixes[$options['permalink_prefix']] = [];

		$storage->permalink_prefixes = $prefixes;

		register_post_type($options['permalink_prefix'],
			array(
				'labels' => array(
					'name' => __(ucfirst($options['permalink_prefix'])),
					'singular_name' => __(ucfirst($options['permalink_prefix']))
				),
				'public' => true,
				'publicly_queryable' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $options['permalink_prefix'] .'/%category%', 'with_front' => false),
    			'capability_type' => 'post',
    			'show_ui' => true,
    			'query_var' => true,
    			'hierarchical' => false,
    			'taxonomies' => array('post_tag', 'category'),
			)
		);

		workhorse_debug_message('New post type created '. $optoins['permalink_prefix']);

		$wp_rewrite->flush_rules(false);

		$storage->flush_rules = true;
	}

	$wpdb->query('SET autocommit = 0;');

	$lite = new LiteSpintax();
	$channel_cache = array('state' => array(null, null), 'city' => array(null, null));

	$google_api_key = get_option("workhorse_google_api_key");

	// Load shortcodes
	$shortModel = new Shortcode();
	$shorts = array();

	preg_match_all("/\[([^\]]+)\]/ms", $content, $shortcodes);
	if (isset($shortcodes[1])) {
		foreach ($shortcodes[1] as $shortcode) {
			$short = $shortModel->getByShortcode($shortcode);
			if ($short && $short->content && strpos($short->content, '[{') == 0) {
				$media = json_decode($short->content, true);

				$shorts[$shortcode] = sizeof($media) - 1;
			}
		}
	}

	// Load lists
	$listModel = new Lists();
	$lists = workhorse_get_lists_from_text(array(
		'title' => $data['title'],
		'content' => $data['content'],
		'custom_title' => $options['custom_title'],
		'custom_description' => $options['custom_description'],
		'custom_keywords' => $options['custom_keywords'],
		'permalink' => $options['permalink'],
		'tags' => $options['tags']
	));

	workhorse_debug_message('Ready for building.. (time '. workhorse_debug_time() .' ms)<br>--------------------------<br>');

	for ($i = 1; $i <= $posts; $i++) {
		$project->iteration++;
		$current_per_day++;
		$current_post++;

		if ($project->iteration == $project->max_iterations + 1) {
			$project->iteration = $project->max_iterations;
			break;
		}

		workhorse_debug_message('Post #'. $i);

		if (isset($options['permalink_prefix'])) {
			$data['post_type'] = $options['permalink_prefix'];
		}

		if ($geo) {
			$geoIteration = workhorse_get_current_subiteration($project->iteration, $geoIterations);
			$geoData = workhorse_get_geodata($options['local_geo_country'], $options['local_geo_locations'][$geoIteration - 1]);

			workhorse_debug_message('Received geodata (time '. workhorse_debug_time() .' ms)');

			// Channel pages
			if ($geoData['city'] && isset($data['state_channel_page'])) {
				ChannelManager::create($project->id, $data, $geoData, 'state');

				workhorse_debug_message('State channel created (time '. workhorse_debug_time() .' ms)');
			}

			if ($geoData['zip'] && isset($data['city_channel_page'])) {
				ChannelManager::create($project->id, $data, $geoData, 'city');

				workhorse_debug_message('City channel created (time '. workhorse_debug_time() .' ms)');
			}

			// Save permalink structure for channels
			if (isset($options['permalink_prefix'])) {
				$storage = new Storage('workhouse');

				$prefixes = $storage->permalink_prefixes;
				if (!sizeof($prefixes[$options['permalink_prefix']])) {
					$prefixes[$options['permalink_prefix']] = ChannelManager::getPermalinkStructure($project->id);

					$storage->permalink_prefixes = $prefixes;

					workhorse_debug_message('Permalink structure saved (time '. workhorse_debug_time() .' ms)');
				}
			}
		}

		// Get current spintax iteration
		$spintaxIteration = workhorse_get_current_subiteration($project->iteration, $project->spintax_iterations);

		// Get current iteration for each field
		$titleIteration = workhorse_get_spintax_subiteration($titleMax, $project, $spintaxIteration);
		//$contentIteration = workhorse_get_spintax_subiteration($contentMax, $project, $spintaxIteration);

		$titleText = Spintax::make($title, $titleIteration, $titleSpintax, false);
		if ($geo) $titleText = Spintax::geo($titleText, $geoData);

		$contentText = $lite->process($content);

		if ($geo) $contentText = Spintax::geo($contentText, $geoData);

		// Images EXIF
		if (isset($options['exif_locations'])) {
			if (isset($options['use_post_location'])) {
				$address = urlencode($geoData['country'] .', '. $geoData['state'] .', '. $geoData['city'] .', '. $geoData['zip']);
			} else {
				$locationIteration = workhorse_get_current_subiteration($project->iteration, sizeof($exifLocations)) - 1;
				$address = $exifLocations[$locationIteration]->address;
			}

			if (!isset($options['exif_cache'])) $options['exif_cache'] = [];
			if (!isset($options['exif_cache'][$address])) $options['exif_cache'][$address] = [];

			preg_match_all('/src=\\\"([^"]*)\\\" alt=\\\"([^"]*)\\\" width/ui', $contentText, $exif);

			if (isset($exif[1])) {
				foreach ($exif[1] as $idx => $image) {
					if (!isset($options['exif_cache'][$address][$image])) {
						$image = str_replace(':8000', '', $image); // Fix only for local dev
						$filename = sha1($address .'-'. $image .'-exif') .'.jpg';

						$exploded = explode('.', $image);
					    $ext = $exploded[count($exploded) - 1];

					    if (preg_match('/jpg|jpeg/i', $ext))
					        $imageSrc = imagecreatefromjpeg($image);
					    else if (preg_match('/png/i', $ext))
					        $imageSrc = imagecreatefrompng($image);
					    else if (preg_match('/gif/i', $ext))
					        $imageSrc = imagecreatefromgif($image);
					    else if (preg_match('/bmp/i', $ext))
					        $imageSrc = imagecreatefromwbmp($image);

					    $imagedir = 'uploads/'. date('Y') .'/'. date('m') .'/'. $filename;
						workhorse_check_dir($imagedir);

						// Location coordinates
						if (isset($options['use_post_location'])) {
							$response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$google_api_key"));

							if ($response->status == 'OK') {
								$location = $response->results[0]->geometry->location;
							}
						} else {
							$location = $exifLocations[$locationIteration]->location;
						}

						if ($location) {
						    addGpsInfo(
						    	$imageSrc,
						    	WP_CONTENT_DIR .'/'. $imagedir,
						    	$exif[2][$idx],
						    	$location->lng,
						    	$location->lat,
						    	0,
						    	date('Y-m-d H:i:s')
					    	);
						}

				    	$savedir = "/wp-content/$imagedir";

					    // local dev fix
					    $image = str_replace('.app', '.app:8000', $image);

				    	$options['exif_cache'][$address][$image] = $savedir;
					} else {
						$savedir = $options['exif_cache'][$address][$image];
					}

			    	$contentText = str_replace($image, $savedir, $contentText);
				}
			}
		}

		// Check if project still exists
		$test = $model->find($id);
		if (!$test || ($test && !$test->id)) {
			echo '<h3>Project stopped by user.</h3>';
			return;
		}
		if ($test && $test->deleted_at == '1970-01-01 11:11:11') {
			echo '<h3>Project stopped by user.</h3>';
			break;
		}

		// Permalink
		$postName = $titleText;

		if (isset($options['permalink']) && $options['permalink']) {
			$postName = Spintax::geo($options['permalink'], $geoData);
			$postName = str_replace('@title', $titleText, $postName);
		}

		// Distribute
		$author_id = 1;

		if (isset($options['distribute'])) {
			$author_id = $authors[mt_rand(0, sizeof($authors) - 1)];
		}

		if (isset($options['dripfeed_type'])) {
			$date_start = strtotime($start_date->format('Y-m-d') .' 00:00:00');
			$date_end = strtotime($start_date->format('Y-m-d') .' 23:59:59');

			$post_date = date('Y-m-d H:i:s', rand($date_start, $date_end));
		}

		if (isset($options['categorization'])) {
			$last = end($options['categorization']);

			$postName = $geoData[$last];
		}

		// Randomize shortcodes
		foreach ($shorts as $short => $max) {
			$contentText = str_replace("[$short]", '['. $short .' key="'. mt_rand(0, $max) .'"]', $contentText);
		}

		// Render workhorse lists
		$titleText = workhorse_set_list_item($titleText, $lists, $project->iteration);
		$contentText = workhorse_set_list_item($contentText, $lists, $project->iteration);
		$postName = workhorse_set_list_item($postName, $lists, $project->iteration);

		/*$post_id = wp_insert_post([
            'post_title' => $titleText,
            'post_name' => sanitize_title($postName),
            'post_date' => $post_date,
            'post_author' => $author_id,
            'post_content' => $contentText,
            'post_status' => $interval == 0 ? 'publish' : 'future',
            'post_type' => $data['post_type'],
            'comment_status' => 'closed',
            'ping_status' => 'closed'
		]);*/
		$wpdb->query($wpdb->prepare("INSERT IGNORE INTO `".$wpdb->prefix."posts`
			(post_author, post_content, post_title, comment_status, ping_status, post_name, post_type,
			 post_date, post_date_gmt, post_status)
			VALUES (%s, %s, %s, 'closed', 'closed', %s, %s, %s, %s, %s)", $author_id, $contentText,
			$titleText, sanitize_title($postName), $data['post_type'], $post_date, $post_date, strtotime($post_date) <= time() ? 'publish' : 'future'));

		$post_id = $wpdb->insert_id;

		workhorse_debug_message('Post created (time '. workhorse_debug_time() .' ms)');

		// Categorization
		if (isset($options['categorization'])) {
			$tags = $options['categorization'];
			$category = null;

			foreach ($tags as $tag) {
				if ($tag == $last) continue;

				$category = wp_create_category($geoData[$tag], $category);
			}

			wp_set_post_categories($post_id, array($category));

			workhorse_debug_message('All categories created (time '. workhorse_debug_time() .' ms)');
		}

		add_post_meta($post_id, 'workhorse_project_id', $project->id);

		// On-Page SEO Section
		if (isset($options['custom_title'])) {
			$customTitleText = workhorse_spintax_the_field($options['custom_title'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_custom_title', $customTitleText);
			//add_post_meta($post_id, '_yoast_wpseo_title', $customTitleText); // Yoast SEO
		}
		if (isset($options['custom_description'])) {
			$customDescriptionText = workhorse_spintax_the_field($options['custom_description'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_custom_description', $customDescriptionText);
			//add_post_meta($post_id, '_yoast_wpseo_metadesc', $customDescriptionText);
		}
		if (isset($options['custom_keywords'])) {
			$customKeywordsText = workhorse_spintax_the_field($options['custom_keywords'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_custom_keywords', $customKeywordsText);
		}

		// Schema Section
		if (isset($options['schema_business'])) {
			$schemaBusinessText = workhorse_spintax_the_field($options['schema_business'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_business', $schemaBusinessText);
		}
		if (isset($options['schema_description'])) {
			$schemaDescriptionText = workhorse_spintax_the_field($options['schema_description'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_description', $schemaDescriptionText);
		}
		if (isset($options['schema_email'])) {
			$schemaEmailText = workhorse_spintax_the_field($options['schema_email'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_email', $schemaEmailText);
		}
		if (isset($options['schema_telephone'])) {
			add_post_meta($post_id, 'workhorse_schema_telephone', $options['schema_telephone']);
		}
		if (isset($options['schema_social'])) {
			$schemaSocialText = workhorse_spintax_the_field($options['schema_social'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_social', $schemaSocialText);
		}
		if (isset($options['schema_rating_object'])) {
			$schemaRatingObjectText = workhorse_spintax_the_field($options['schema_rating_object'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_rating_object', $schemaRatingObjectText);
		}
		if (isset($options['schema_rating'])) {
			$schemaRating = workhorse_spintax_the_field($options['schema_rating'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_rating', $schemaRating);
		}
		if (isset($options['schema_rating_count'])) {
			$schemaRatingCount = workhorse_spintax_the_field($options['schema_rating_count'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_rating_count', $schemaRatingCount);
		}
		if (isset($options['schema_address'])) {
			$schemaAddressText = workhorse_spintax_the_field($options['schema_address'], $project, $spintaxIteration, $geo, $geoData, $lists);

			add_post_meta($post_id, 'workhorse_schema_address', $schemaAddressText);
		}
		if (isset($options['hide_schema'])) {
			add_post_meta($post_id, 'workhorse_hide_schema', 1);
		}

		workhorse_debug_message('Post meta created (time '. workhorse_debug_time() .' ms)');

		// Tags
		if (isset($options['tags']) && $options['tags']) {
			$tags = Spintax::geo($options['tags'], $geoData);
			$tags = workhorse_set_list_item($tags, $lists, $project->iteration);

			wp_set_post_tags($post_id, $tags, true);

			// Add noindex meta tag to tag page
			if (isset($options['noindex_tags'])) {
				$tags = explode(',', $tags);

				foreach ($tags as $tag) {
					$term = get_term_by('name', $tag, 'post_tag');

					add_term_meta($term->term_id, 'workhorse_noindex_tag', 1, true);
				}
			}
		}

		// Channel page link
		ChannelManager::addLink($post_id, $geoData);

		workhorse_debug_message('Channel link saved (time '. workhorse_debug_time() .' ms)');

		// Pre-Safe project
		$update = array(
			'iteration' => $project->iteration
		);
		if (isset($options['exif_cache'])) {
			$update['options'] = base64_encode(json_encode($options));
		}

		$model->update($update, $project->id);

		// Commit
		if ($current_post == $step) {
			ChannelManager::save();

			$wpdb->query('COMMIT;');
			$current_post = 0;

			$storage = new Storage('workhouse');
			$storage->flush_rules = true;
		}

		if ($current_per_day == $per_day) {
			$start_date->add(new DateInterval('P1D'));
			$current_per_day = 0;
		} else {
			//$start_date = rand(time() - 43200, time() + 43200);
		}

		// Each 500 iteration, change author list
		if ($i % 500 == 0) {
			$authors = array();
			$_authors = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}usermeta WHERE meta_key = 'workhorse_user' ORDER BY RAND() LIMIT 500");
			foreach ($_authors as $a) {
				$authors[] = $a->user_id;
			}
			shuffle($authors);
		}

		flush();
	}

	$wpdb->query('COMMIT;');

	$wpdb->query("SET autocommit = 1;");

	ChannelManager::save();

	$storage = new Storage('workhouse');
	$storage->flush_rules = true;

	// Save project changes
	$update = array(
		'iteration' => $project->iteration
	);

	if ($project->iteration == $project->max_iterations) {
		$update['finished_at'] = date('Y-m-d H:i:s');
	}

	if (isset($options['exif_cache'])) {
		$update['options'] = base64_encode(json_encode($options));
	}

	$model->update($update, $project->id);

	View::render('builder.index');
	return;
}
