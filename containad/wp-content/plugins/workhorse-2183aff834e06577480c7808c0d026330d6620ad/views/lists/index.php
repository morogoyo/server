<?php
use WorkHorse\View;
?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<span>Work Horse Lists</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
	<h2>
		Work Horse Lists
		<a href="<?= admin_url('admin.php?page=workhorse_lists&action=create') ?>" class="add-new-h2">Create New</a>
	</h2>

	<div class="notice notice-success">
		<p>
			WorkHorse lists allow you to input a list of keywords or niches that you would like to target and use WorkHorse to quickly create posts for all of them.
		</p>
		<p>
			This is handy if you have a list of hundreds of keywords that you would like to bulk create posts for (for example, lists of Amazon products or a list of long tail keywords).
		</p>
		<p>
			WorkHorse will create one post/page for every item in the list. In order to  activate WorkHorse lists, be sure to use the shortcode in the title (you can use it elsewhere too, but make sure it's in the title).
		</p>
		<p>
			You can embed your list by using <strong>@list:listname</strong> (this will also be shown on the create a project page and when you create your list, so no need to memorize it).
		</p>
	</div>
	
	<form method="get">
		<table class="wp-list-table widefat fixed striped">
		<thead>
		<tr>
			<td class="check-column"></td>
			<th>Name</th>
			<th>Content</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($lists as $item): ?>
			<tr>
				<td></td>
				<td class="column-title has-row-actions">
					<strong>
						<a class="row-title" href="<?= admin_url('admin.php?page=workhorse_lists&action=edit&id='. $item->id) ?>"><?= $item->name ?></a>
					</strong>
					<div class="row-actions">
						<span class="edit">
							<a href="<?= admin_url('admin.php?page=workhorse_lists&action=edit&id='. $item->id) ?>" title="Edit this item">Edit</a>
							|
						</span>
						<span class="trash">
							<a class="submitdelete" href="<?= admin_url('admin.php?page=workhorse_lists&action=delete&id='. $item->id .'&noheader=true') ?>" onclick="return confirm('Are you sure you want to delete the list?')">Trash</a>
						</span>
					</div>
				</td>
				<td>
					<?= $item->list ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</form>
<?php View::endSection('content') ?>

<?php View::make('layouts.main') ?>