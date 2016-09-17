<?php
use WorkHorse\View;
?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<a href="<?= admin_url('admin.php?page=workhorse_lists') ?>">Work Horse Lists</a>
	&raquo;
	<span>Edit List</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
	<form action="<?= admin_url('admin.php?page=workhorse_lists&action=do_edit&id='. $list->id .'&noheader=true') ?>" method="post">
		<?php View::render('lists.form', compact('list')) ?>
		
		<div class="Posting__buttons">
			<button class="button button-primary">Save</button>
		</div>
	</form>
<?php View::endSection('content') ?>

<?php View::make('layouts.main') ?>