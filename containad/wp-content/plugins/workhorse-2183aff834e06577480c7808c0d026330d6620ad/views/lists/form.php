<?php
use WorkHorse\Validator;
?>

<div class="BasicForm__row<?php if (Validator::hasError('name')) echo ' PostForm--error' ?>">
	<input type="text" name="name" placeholder="Shortcode Name" value="<?= isset($list) ? $list->name : '' ?>">
	<?php if (Validator::hasError('name')): ?>
	<span class="PostForm__error"><?= Validator::get('name') ?></span>
	<?php endif; ?>
</div>

<div class="BasicForm__row<?php if (Validator::hasError('list')) echo ' PostForm--error' ?>">
	<textarea name="list" placeholder="List of keywords (one per line)" style="min-height: 200px;"><?= isset($list) ? $list->list : '' ?></textarea>
	<?php if (Validator::hasError('list')): ?>
	<span class="PostForm__error"><?= Validator::get('list') ?></span>
	<?php endif; ?>
</div>
