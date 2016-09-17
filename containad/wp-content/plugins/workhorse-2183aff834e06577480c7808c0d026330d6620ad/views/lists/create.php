<?php
use WorkHorse\View;
?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<a href="<?= admin_url('admin.php?page=workhorse_lists') ?>">Work Horse Lists</a>
	&raquo;
	<span>Create New List</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
	<form action="<?= admin_url('admin.php?page=workhorse_lists&action=do_create&noheader=true') ?>" method="post">
		<?php View::render('lists.form') ?>

		<div class="Posting__buttons">
			<button class="button button-primary">Create</button>
		</div>
	</form>
<?php View::endSection('content') ?>

<?php View::make('layouts.main') ?>