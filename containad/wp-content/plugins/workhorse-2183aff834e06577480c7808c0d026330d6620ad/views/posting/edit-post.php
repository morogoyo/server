<?php

use WorkHorse\View;

?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<a href="<?= admin_url('admin.php?page=workhorse_projects') ?>">Work Horse Projects</a>
	&raquo;
	<span>Edit Project</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
<div class="CreatePost">
	<h2>Edit Project</h2>

	<form action="/wp-admin/admin.php?page=workhorse&action=do_create_post&id=<?= $task->id ?>&noheader=true" method="post">
		<?php 
			$post_type = $task->content['post_type'];

			WorkHorse\View::render('posting.form', compact('post_type', 'task'));
		?>
	</form>
</div>
<?php View::endSection('content') ?>

<?php echo View::make('layouts.main') ?>