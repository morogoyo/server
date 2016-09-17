<?php

use WorkHorse\View;

?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<span>Create Page</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
<div class="CreatePost">
	<h2>Add New Page</h2>

	<form action="/wp-admin/admin.php?page=workhorse&action=do_create_post&noheader=true" method="post">
		<?php 
			$post_type = 'page';

			WorkHorse\View::render('posting.form', compact('post_type'));
		?>
	</form>
</div>
<?php View::endSection('content') ?>

<?php echo View::make('layouts.main') ?>