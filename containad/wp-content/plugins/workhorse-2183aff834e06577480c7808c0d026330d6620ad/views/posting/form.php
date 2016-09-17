<?php
use WorkHorse\Validator;
use WorkHorse\Models\Country;

wp_enqueue_script('post');
?>

<input type="hidden" name="post_type" value="<?= isset($task) ? $task->content['post_type'] : $post_type ?>">
<?php
	$word_ai_pass = get_option('workhorse_word_ai_pass');
	$word_ai_email = get_option('workhorse_word_ai_email');

	$pixabay_key = get_option('workhorse_pixabay_key');
	$google_api_key = get_option('workhorse_google_api_key');
?>

<div class="notice notice-success is-dismissible">
	<p>
		WorkHorse tags for local SEO feature:
	</p>
	<p>
		<strong>@city</strong> - current city (i.e Rochester) <br>
		<strong>@state</strong> - current state (i.e Michigan) <br>
		<strong>@stateshort</strong> - current state abbreviation (i.e MI) <br>
 		<strong>@country</strong> - current country (i.e United States) <br>
		<strong>@countryshort</strong> current country abbreviation (i.e US)
	</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>Spintax is supported everywhere! You can use {1|2|3} and either 1, 2, or 3 will be the outcome.</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>
		WorkHorse is a powerful software! Make sure that your server can handle the large amount of traffic that your site will be getting and is powerful enough to handle the page creation. If you are on a smaller server, consider breaking a large project into multiple smaller ones.
	</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>
		Don't use any unnecessary features! See something you don't understand? It's probably best not to mess with it. Almost all errors come from using features that you don't understand. Barebones WorkHorse is more than powerful so please don't feel the need to enable anything you don't know. If you don't need it, it's probably not for you.
	</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>
		<strong>Looking to use WorkHorse for non-local, such as affiliate or Amazon?</strong> Check out the <a href="/wp-admin/admin.php?page=workhorse_lists">WorkHorse lists feature!</a>
	</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>
		Struggling to find content? No worries!
	</p>
	<p>
		You can use the same article across all your posts (you can even use free content from sites like Ezine, just be sure to link back to the source). It is recommended that you sprinkle the keyword that you’re trying to rank for within the article to make it unique and more relevant!
	</p>
</div>

<div class="notice notice-success is-dismissible">
	<p>
		To use gateway / channel pages call @citylist for state area and @ziplist for city area. This will greatly increase the load on your server from the project.
	</p>
</div>

<div id="poststuff" class="PostForm">
	<div id="post-body" class="metabox-holder columns-2">
		<div id="post-body-content">
			<div class="PostForm__name-wrap<?php if (Validator::hasError('name')) echo ' PostForm--error' ?>">
				<input type="text" name="name" class="PostForm__name" placeholder="Project name here" value="<?= Validator::old('name', $task->name) ?>">
				<?php if (Validator::hasError('name')): ?>
				<span class="PostForm__error"><?= Validator::get('name') ?></span>
				<?php endif; ?>
			</div>

			<div class="PostForm__title-wrap<?php if (Validator::hasError('title')) echo ' PostForm--error' ?>">
				<input type="text" id="title" name="title" class="PostForm__title" placeholder="Enter title here" value="<?= Validator::old('title', $task->content['title']) ?>">
				<?php if (Validator::hasError('title')): ?>
				<span class="PostForm__error"><?= Validator::get('title') ?></span>
				<?php endif; ?>

				<div id="edit-slug-box">
					<?php
						$old_permalink = Validator::old('permalink', $task->options['permalink']);
					?>
					<input type="hidden" name="permalink" value="<?= $old_permalink ?>">
					<strong>Permalink:</strong>
					<span><?= workhorse_permalink($old_permalink) ?></span>
					<a id="edit-permalink" class="button button-small" aria-label="Edit permalink">Edit</a>
					<a id="save-permalink" class="button button-small" style="display: none">OK</a>
					<a id="prefix-permalink" class="button button-small button-primary" style="display: none;">Add Prefix</a>
					<a id="cancel-permalink" class="cancel button-link" style="display: none">Cancel</a><br />
					<div class="howto">
						The non-editable URL structure is determined by your <a href="/wp-admin/options-permalink.php">permalink settings</a>.
					</div>
					<p id="too-many-posts" class="notice notice-error" style="display: none;">Your project contains more than 5,000 pages. While WorkHorse can create hundreds of thousands of posts per project, it is recommended to split your project into multiple smaller projects if you are using shared hosting for maximum efficiency. VPS and dedicated server users can ignore this message.</p>
				</div>
			</div>

			<div class="PostForm__body-wrap<?php if (Validator::hasError('content')) echo ' PostForm--error' ?>">
				<?php wp_editor(Validator::old('content', $task->content['content']), 'content', array(
					'_content_editor_dfw' => '',
					'drag_drop_upload' => true,
					'tabfocus_elements' => 'content-html,save-post',
					'editor_height' => 300,
					'tinymce' => array(
						'resize' => false,
						'add_unload_trigger' => false,
						'setup' => 'function (ed) { ed.on("change", function(e) { determineMaxPosts(); }) }'
					),
				)); ?>
				<?php if (Validator::hasError('content')): ?>
				<span class="PostForm__error"><?= Validator::get('content') ?></span>
				<?php endif; ?>
			</div>

			<div class="PostForm__buttons">
				<button name="create" type="submit" class="button button-primary">Create Project</button>
				<button name="draft" type="submit" class="button button-primary">Save As Draft</button>
			</div>
		</div>

		<div id="postbox-container-1" class="postbox-container">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">
				<!-- Options -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Options</span></h2>
					<div class="inside">
						<p>
							<label for="max-posts">
								<strong>Max Posts:</strong> <br>
								<em>
									Maximum number of posts to generate. <br>
									Input `0` if you want to generate all available posts from spintax.
								</em>
							</label>
							<input type="number" id="max-posts" name="max_posts" value="<?= Validator::old('max_posts', (int) $task->options['max_posts']) ?>">
						</p>

						<p>
							<strong>Distribute among users randomly:</strong> <br>
							<em>
								Distribute posts among <a href="<?= admin_url('admin.php?page=workhorse_users') ?>">Work Horse users</a> randomly.
							</em>
							<br>
							<input type="checkbox" id="distribute" name="distribute" value="1" <?= Validator::old('distribute', $task->options['distribute']) == 1 ? 'checked' : ''; ?>>
							<label for="distribute">Distribute</label>
						</p>
					</div>
				</div>

				<!-- DripFeed Property -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Dripfeed Property</span></h2>
					<div class="inside">
						<?php
							$old_dripfeed_enabler = Validator::old('dripfeed_enabler', $task->options['dripfeed_type'] ? 1 : 0);
						?>
						<label for="dripfeed-enabler" class="selectit">
							<input id="dripfeed-enabler" name="dripfeed_enabler" type="checkbox" value="1" <?= $old_dripfeed_enabler == 1 ? 'checked' : ''; ?>>
							Enable Feature
						</label>

						<div id="dripfeed-wrap" style="display: <?= $old_dripfeed_enabler == 1 ? 'block' : 'none'; ?>;">
							<p>
								<label for="dripfeed-type"><strong>Dripfeed Type:</strong></label>
								<?php $old_dripfeed_type = Validator::old('dripfeed_type', $task->options['dripfeed_type']) ?>
								<select id="dripfeed-type" name="dripfeed_type">
									<option value="per-day"<?= $old_dripfeed_type == 'per-day' ? ' selected' : '' ?>>X posts/pages per day</option>
									<option value="over-days"<?= $old_dripfeed_type == 'over-days' ? ' selected' : '' ?>>Whole project dripped over X days</option>
								</select>
							</p>

							<p class="<?= (Validator::hasError('dripfeed_x')) ? 'PostForm--error' : '' ?>">
								<label for="dripfeed-x"><strong>X Parameter:</strong></label>
								<input type="text" id="dripfeed-x" name="dripfeed_x" value="<?= Validator::old('dripfeed_x', $task->options['dripfeed_x']) ?>">
								<?php if (Validator::hasError('dripfeed_x')): ?>
								<span class="PostForm__error"><?= Validator::get('dripfeed_x') ?></span>
								<?php endif; ?>
							</p>
						</div>

						<p>
							<em>
								It is not recommended to dripfeed multiple projects at the same time on the same server as it puts an elongated load on your server. Creating all pages at once is recommended unless you have a reason not to.
							</em>
						</p>
					</div>
				</div>

				<!-- Tags -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Tags</span></h2>
					<div class="inside">
						<input type="hidden" name="tags">
						<p>
							<input type="text" id="tagsinput" size="16" autocomplete="off" value="<?= Validator::old('tags', $task->options['tags']) ?>">
							<a id="add-tags" class="button">Add</a>
						</p>
						<p class="howto">Separate tags with commas</p>
						<div id="tags" class="tagchecklist"></div>

						<label for="noindex_tags" class="selectit">
							<input id="noindex_tags" name="noindex_tags" type="checkbox" value="1" <?= Validator::old('noindex_tags', $task->options['noindex_tags']) == 1 ? 'checked' : ''; ?>>
							Noindex tags
						</label>
						<p class="howto">Helps fight duplicate content on tag pages; not recommended</p>

					</div>
				</div>

				<?php if ($word_ai_email && $word_ai_pass): ?>
				<!-- Word AI -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Word AI Options</span></h2>
					<div class="inside">
						<p>
							<a href="<?= WORKHORSE_DIR ?>/wordai.php" onclick="return WordAI.start(this)">Launch Word AI Console</a>
						</p>
					</div>
				</div>
				<?php endif; ?>

				<!-- Categorization -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Permalink Structure</span></h2>
					<div class="inside">
						<?php
							$old_enable_categorization = Validator::old('enable_categorization', isset($task->options['enable_categorization']));
						?>
						<p>
							<label for="enable_categorization" class="selectit">
								<input id="enable_categorization" name="enable_categorization" type="checkbox" value="1" <?= $old_enable_categorization == 1 ? 'checked' : ''; ?>>
								Enable Categorization
							</label>
						</p>
						<p class="howto">
							This will create pages like <strong>/plumber/michigan/troy/48098</strong>, instead of <strong>/plumber-michigan-troy-48098</strong> <br>
							In this case, "plumber" would be the URL prefix
						</p>
						<p>
							<label for="url-prefix">
								<strong>URL Prefix</strong>
								<br>
							</label>
							<input type="text" name="permalink_prefix" value="<?= Validator::old('permalink_prefix', $task->options['permalink_prefix']) ?>">
						</p>
						<p class="howto">
							This will override Wordpress settings and put a heavy load on your server. It is not recommended.
						</p>
					</div>
				</div>

				<!-- Images Scraper -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Images</span></h2>
					<div class="inside">
						<?php
							$old_exif_enabler = Validator::old('exif_enabler', sizeof($task->options['exif_locations']) > 0);

							if (!empty($google_api_key)):
						?>
						<p>
							<label for="exif-enabler" class="selectit">
								<input id="exif-enabler" name="exif_enabler" type="checkbox" value="1" <?= $old_exif_enabler == 1 ? 'checked' : ''; ?>>
								Enable Image EXIF
							</label>
						</p>
						<?php else: ?>
							<div class="PixabayKeyWarning">
								Please, enter Google Maps API Key in <a href="/wp-admin/admin.php?page=workhorse_settings">Plugin Settings</a>.
							</div>
						<?php endif; ?>

						<div id="exif-wrap" style="display: <?= $old_exif_enabler == 1 ? 'block' : 'none' ?>">
							<p>
								<label for="use-post-location" class="selectit">
									<input id="use-post-location" name="use_post_location" type="checkbox" value="1" <?= Validator::old('use_post_location', $task->options['use_post_location']) == 1 ? 'checked' : ''; ?>>
									Use Post Location
								</label>
							</p>

							<p>
								<a href="/index.php?api=workhorse&action=exif" onclick="return ImageEXIF.start(this)">Set Locations For Images</a>
							</p>
						</div>

						<p>
							<?php
								$old_local_seo_enabler = Validator::old('local_seo_enabler', !empty($task->options['local_geo_country']));

								if (!empty($pixabay_key)):
							?>
							<input type="hidden" id="pixabay-api-key" value="<?= $pixabay_key ?>">
							<a href="<?= WORKHORSE_DIR ?>/imagescraper.php" title="Image Scraper" onclick="return ImageScraper.start(this)">Launch Images Scraper</a>
							<?php else: ?>
								<div class="PixabayKeyWarning">
									Please, enter Pixabay API Key in <a href="/wp-admin/admin.php?page=workhorse_settings">Plugin Settings</a>.
								</div>
							<?php endif; ?>
						</p>
					</div>
				</div>

				<!-- Videos Scraper -->
				<div class="postbox">
					<button type="button" class="handlediv button-link" aria-expanded="true">
						<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
					<h2 class="hndle ui-sortable-handle"><span>Work Horse Videos</span></h2>
					<div class="inside">
						<p>
							<?php
								$youtube_key = get_option('workhorse_google_api_key');

								if (!empty($youtube_key)):
							?>
							<input type="hidden" id="youtube-api-key" value="<?= $youtube_key ?>">
							<a href="<?= WORKHORSE_DIR ?>/videoscraper.php" title="Image Scraper" onclick="return VideoScraper.start(this)">Launch Videos Scraper</a>
							<?php else: ?>
								<div class="PixabayKeyWarning">
									Please, enter YouTube API Key in <a href="/wp-admin/admin.php?page=workhorse_settings">Plugin Settings</a>.
								</div>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div id="postbox-container-2" class="postbox-container">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div class="PostForm__boxes">

					<!-- On-Page SEO -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h2 class="hndle"><span>Work Horse SEO Options</span></h2>
						<div class="inside">
							<?php
								$old_on_page_seo = Validator::old('on_page_seo', !empty($task->options['custom_title']) || !empty($task->options['custom_description']) || !empty($task->options['custom_keywords']));
							?>
							<table class="form-table">
							<tbody>
								<tr>
									<th>
										<label for="on-page-seo">Enable Work Horse On-Page Customizer:</label>
									</th>
									<td>
										<input id="on-page-seo" name="on_page_seo" type="checkbox" value="1"<?= $old_on_page_seo == 1 ? ' checked' : '' ?>>
									</td>
								</tr>
							</tbody>
							</table>

							<div id="on-page-seo-wrap" style="display: <?= $old_on_page_seo == 1 ? 'block' : 'none' ?>;">
								<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label for="custom-title">Title:</label>
										</th>
										<td>
											<input id="custom-title" name="custom_title" type="text" class="full-width" value="<?= Validator::old('custom_title', $task->options['custom_title']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="custom-description">Description:</label>
										</th>
										<td>
											<textarea id="custom-description" name="custom_description" class="full-width"><?= Validator::old('custom_description', $task->options['custom_description']) ?></textarea>
										</td>
									</tr>
									<tr>
										<th>
											<label for="custom-keywords">Keywords:</label>
										</th>
										<td>
											<textarea id="custom-keywords" name="custom_keywords" class="full-width"><?= Validator::old('custom_keywords', $task->options['custom_keywords']) ?></textarea>
										</td>
									</tr>
								</tbody>
								</table>
							</div>

							<?php

							?>
							<table class="form-table">
							<tbody>
								<tr>
									<th>
										<label for="local-seo-enabler">Enable Work Horse Local SEO Feature:</label>
									</th>
									<td>
										<input id="local-seo-enabler" name="local_seo_enabler" type="checkbox" value="1" <?= $old_local_seo_enabler == 1 ? 'checked' : ''; ?>>
									</td>
								</tr>
							</tbody>
							</table>

							<div id="local-seo-wrap" style="display: <?= $old_local_seo_enabler == 1 ? 'block' : 'none'; ?>;">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label for="local-randomize">Randomize Results:</label>
										</th>
										<td>
											<input id="local-randomize" name="local_randomize" type="checkbox" value="1" <?= Validator::old('local_randomize', $task->options['local_randomize']) == 1 ? 'checked' : '' ?>>
										</td>
									</tr>
									<tr>
										<th>
											<label for="local-country">Country:</label>
										</th>
										<td>
											<?php
												$countries = array('us' => 'United States', 'uk' => 'United Kingdom');
												$countryModel = new Country();
												$otherCountries = $countryModel->all('name');
											?>
											<select id="local-country" name="local_country">
												<option value>- Select Country -</option>
												<?php foreach ($countries as $short => $name): ?>
												<option value="<?= $short ?>" <?= Validator::old('local_geo_country', $task->options['local_geo_country']) == $short ? 'selected':'' ?>>
													<?= $name ?>
												</option>
												<?php endforeach; ?>
												<?php foreach ($otherCountries as $other): ?>
												<option value="<?= $other->id ?>">
													<?= $other->name ?>
												</option>
												<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<th>
											<label>Choose locations:</label> <br>
											<small>
												Press 'Shift + Left Mouse' to select all tree nodes
											</small>
										</th>
										<td>
											<div id="jstree"></div>
										</td>
									</tr>
									<?php if ($task->options['local_geo_locations']): ?>
									<script>
										var local_geo_locations = <?= json_encode($task->options['local_geo_locations']) ?>;
									</script>
									<?php endif; ?>
								</tbody>
								</table>
							</div>

							<?php
								$old_schema = Validator::old('schema', $task->options['schema']);
							?>
							<table class="form-table">
							<tbody>
								<tr>
									<th>
										<label for="schema">Enable Work Horse Schema:</label>
									</th>
									<td>
										<input id="schema" name="schema" type="checkbox" value="1"<?= $old_schema == 1 ? ' checked' : '' ?>>
									</td>
								</tr>
							</tbody>
							</table>

							<div id="schema-wrap" style="display: <?= $old_schema == 1 ? 'block' : 'none' ?>;">
								<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label for="hide-schema">Hide schema from users:</label>
										</th>
										<td>
											<input type="checkbox" name="hide_schema" id="hide-schema" value="1" <?= Validator::old('hide_schema', $task->options['hide_schema']) ? 'checked' : '' ?>>
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-business">Business Name:</label>
										</th>
										<td>
											<input id="schema-business" name="schema_business" type="text" class="full-width" value="<?= Validator::old('schema_business', $task->options['schema_business']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-description">Description:</label>
										</th>
										<td>
											<textarea id="schema-description" name="schema_description" class="full-width"><?= Validator::old('schema_description', $task->options['schema_description']) ?></textarea>
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-email">E-mail:</label>
										</th>
										<td>
											<input type="text" id="schema-email" name="schema_email" class="full-width" value="<?= Validator::old('schema_email', $task->options['schema_email']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-telephone">Telephone:</label>
										</th>
										<td>
											<input type="tel" id="schema-telephone" name="schema_telephone" class="full-width" value="<?= Validator::old('schema_telephone', $task->options['schema_telephone']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-social">Social pages:</label>
										</th>
										<td>
											<textarea id="schema-social" name="schema_social" class="full-width"><?= Validator::old('schema_social', $task->options['schema_social']) ?></textarea>
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-rating-object">Rating Object:</label>
										</th>
										<td>
											<input id="schema-rating-object" name="schema_rating_object" type="text" class="full-width" value="<?= Validator::old('schema_rating_object', $task->options['schema_rating_object']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-rating">Rating:</label>
										</th>
										<td>
											<input id="schema-rating" name="schema_rating" type="text" class="full-width" value="<?= Validator::old('schema_rating', $task->options['schema_rating']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-rating-count">Rating Count:</label>
										</th>
										<td>
											<input id="schema-rating-count" name="schema_rating_count" type="text" class="full-width" value="<?= Validator::old('schema_rating_count', $task->options['schema_rating_count']) ?>">
										</td>
									</tr>
									<tr>
										<th>
											<label for="schema-address">Address:</label>
										</th>
										<td>
											<textarea id="schema-address" name="schema_address" class="full-width"><?= Validator::old('schema_address', $task->options['schema_address']) ?></textarea>
										</td>
									</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="false">
							<span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h2 class="hndle ui-sortable-handle"><span>Work Horse Channel Pages</span></h2>
						<div class="inside">
							<?php
								$old_state_channel = Validator::old('state_channel_page', $task->content['state_channel_enabled']);
								$old_city_channel = Validator::old('city_channel_page', $task->content['city_channel_enabled']);
							?>
							<p id="channel-howto" class="howto" <?= $old_enable_categorization == 1 ? 'style="display: none;"' : '' ?>>
								You need enable categorization for using channel pages.
							</p>

							<p>
								<label for="state-channel-page" class="selectit">
									<input id="state-channel-page" name="state_channel_page" type="checkbox" value="1" <?= $old_enable_categorization == 1 && $old_state_channel == 1 ? 'checked' : ''; ?> <?= $old_enable_categorization == 1 ? '' : 'disabled' ?>>
									<strong>Enable State Channel Pages</strong>
								</label>
							</p>

							<div id="state-channel-page-wrap" <?= $old_state_channel == 1 ? '' : 'style="display: none;"'; ?>>
								<div class="PostForm__title-wrap<?php if (Validator::hasError('state_channel_title')) echo ' PostForm--error' ?>">
									<input type="text" id="state-channel-title" name="state_channel_title" class="PostForm__title" placeholder="Enter title here" value="<?= Validator::old('state_channel_title', $task->content['state_channel_title']) ?>">
									<?php if (Validator::hasError('state_channel_title')): ?>
									<span class="PostForm__error"><?= Validator::get('state_channel_title') ?></span>
									<?php endif; ?>
								</div>

								<?php wp_editor(Validator::old('state_channel_content', $task->content['state_channel_page']), 'state_channel_content', array(
									'_content_editor_dfw' => '',
									'drag_drop_upload' => true,
									'tabfocus_elements' => 'content-html,save-post',
									'editor_class' => 'editor-hidden',
									'editor_height' => 300,
									'tinymce' => array(
										'resize' => false,
										'add_unload_trigger' => false,
									),
								)); ?>

							</div>

							<p>
								<label for="city-channel-page" class="selectit">
									<input id="city-channel-page" name="city_channel_page" type="checkbox" value="1" <?= $old_enable_categorization == 1 && $old_city_channel == 1 ? 'checked' : ''; ?> <?= $old_enable_categorization == 1 ? '' : 'disabled' ?>>
									<strong>Enable City Channel Pages</strong>
								</label>
							</p>

							<div id="city-channel-page-wrap" <?= $old_city_channel == 1 ? '' : 'style="display: none;"'; ?>>
								<div class="PostForm__title-wrap<?php if (Validator::hasError('city_channel_title')) echo ' PostForm--error' ?>">
									<input type="text" id="city-channel-title" name="city_channel_title" class="PostForm__title" placeholder="Enter title here" value="<?= Validator::old('city_channel_title', $task->content['city_channel_title']) ?>">
									<?php if (Validator::hasError('city_channel_title')): ?>
									<span class="PostForm__error"><?= Validator::get('city_channel_title') ?></span>
									<?php endif; ?>
								</div>

								<?php wp_editor(Validator::old('city_channel_content', $task->content['city_channel_page']), 'city_channel_content', array(
									'_content_editor_dfw' => '',
									'drag_drop_upload' => true,
									'tabfocus_elements' => 'content-html,save-post',
									'editor_class' => 'editor-hidden',
									'editor_height' => 300,
									'tinymce' => array(
										'resize' => false,
										'add_unload_trigger' => false,
									),
								)); ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
