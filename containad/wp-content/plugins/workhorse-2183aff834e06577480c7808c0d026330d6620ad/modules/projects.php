<?php

use WorkHorse\View;
use WorkHorse\Validator;
use WorkHorse\Models\Task;
use WorkHorse\FlashMessage;

function workhorse_projects() {
	global $wpdb;

	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
	$offset = isset($_GET['paged']) ? $_GET['paged'] * $limit - $limit : 0;
	$model = new Task();

	if ($action == 'index'):
		// Filters
		$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'created_at';
		$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

		$highlight = isset($_GET['highlight']) ? $_GET['highlight'] : null;

		$where = array();
		$params = array();

		$sql = 'SELECT * FROM '. $model->getTable();
		if (sizeof($where)) {
			$sql .= ' WHERE '. implode(' AND ', $where);
		}

		$sqlTotal = 'SELECT COUNT(id) AS total FROM '. $model->getTable();
		if (sizeof($where)) {
			$sqlTotal .= ' WHERE '. implode(' AND ', $where);
		}

		$sqlTotal = $wpdb->prepare($sqlTotal, $params);

		$sql .= " ORDER BY $orderBy $order";
		$sql .= " LIMIT %d, %d";

		$params[] = $offset;
		$params[] = $limit;

		$sql = $wpdb->prepare($sql, $params);

		// Data
		$projects = $wpdb->get_results($sql);
		$total_row = $wpdb->get_row($sqlTotal);
		$total = $total_row->total;

		$pages = ceil($total / $limit);
		$page = floor($offset / $limit) + 1;

		View::render('projects.index', compact('projects', 'page', 'pages', 'order', 'orderBy', 'highlight'));

	elseif ($action == 'delete'):

		$id = $_GET['id'];
		$task = $model->find($id);

		// Delete all posts from this project
		$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix ."posts WHERE ID IN (SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s)", $id));
		$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix ."postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s", $id));

		$model->delete($id);

		FlashMessage::success('Project and all posts/pages deleted.');
		wp_redirect('/wp-admin/admin.php?page=workhorse_projects');
		exit;

	elseif ($action == 'delete_posts'):

		$id = $_GET['id'];

		// Delete all posts from this project
		$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix ."postmeta WHERE post_id IN (SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s) AND meta_key = 'workhorse_channel'", $id));
		$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix ."posts WHERE ID IN (SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s)", $id));
		$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix ."postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s", $id));

		$model->update(array('iteration' => 0), $id);

		FlashMessage::success('All posts/pages deleted.');
		wp_redirect('/wp-admin/admin.php?page=workhorse_projects');
		exit;

	elseif ($action == 'stop'):

		$id = $_GET['id'];

		$model->update(array('deleted_at' => '1970-01-01 11:11:11'), $id);

		FlashMessage::success('Project stopped. You can continue process by clicking Build posts');
		wp_redirect('/wp-admin/admin.php?page=workhorse_projects');
		exit;

	elseif ($action == 'export_urls'):

		$id = $_GET['id'];

		@set_time_limit(0);

		$urls = "";
		$posts = $wpdb->get_results($wpdb->prepare("SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = 'workhorse_project_id' AND meta_value = %s", $id));
		foreach ($posts as $post) {
			$urls .= get_permalink($post->post_id) ."\r\n";
		}

		file_put_contents("project-$id.txt", $urls);

		header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename("project-$id.txt"));
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize("project-$id.txt"));
	    readfile("project-$id.txt");
		exit;

	elseif ($action == 'duplicate'):

		$id = $_GET['id'];

		$task = $model->find($id);

		$new_id = $model->create(array(
			'name' => $task->name,
			'content' => base64_encode(json_encode($task->content)),
			'options' => base64_encode(json_encode($task->options)),
			'spintax_iterations' => $task->spintax_iterations,
			'max_iterations' => $task->max_iterations,
			'state' => 'Draft'
		));

		FlashMessage::success('Project duplicated.');
		wp_redirect('/wp-admin/admin.php?page=workhorse_projects&highlight='. $new_id);
		exit;

	endif;
}
