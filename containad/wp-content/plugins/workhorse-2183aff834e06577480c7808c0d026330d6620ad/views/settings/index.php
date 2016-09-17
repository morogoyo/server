<?php
use WorkHorse\View;
?>

<?php View::startSection('breadcrumbs') ?>
    <a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
    &raquo;
    <span>Settings</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
<h2>Work Horse Settings</h2>

<form method="post" action="options.php">
	<?php settings_fields('workhorse_settings'); ?>

	<table class="form-table">
        <tr valign="top">
            <th scope="row">Pixabay API Key</th>
            <td>
                <input type="text" name="workhorse_pixabay_key" style="width: 400px" value="<?php echo get_option('workhorse_pixabay_key'); ?>" /><br />
								<p class="howto">How to Get a Free Pixabay API Key: <a href="https://www.youtube.com/watch?v=t3mxF7m2wWw" target="_blank">https://www.youtube.com/watch?v=t3mxF7m2wWw</a></p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Google API Key</th>
            <td>
                <input type="text" name="workhorse_google_api_key" style="width: 400px" value="<?php echo get_option('workhorse_google_api_key'); ?>" /><br />
								<p class="howto">How to Get a Free Google Maps API Key: <a href="http://www.youtube.com/watch?v=arWQ9Wk3t1w" target="_blank">http://www.youtube.com/watch?v=arWQ9Wk3t1w</a></p>
						</td>
        </tr>
        <tr valign="top">
            <th scope="row">Word AI Email</th>
            <td>
                <input type="text" name="workhorse_word_ai_email" style="width: 400px" value="<?php echo get_option('workhorse_word_ai_email'); ?>" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Word AI Password</th>
            <td>
                <input type="text" name="workhorse_word_ai_pass" style="width: 400px" value="<?php echo get_option('workhorse_word_ai_pass'); ?>" />
            </td>
        </tr>
    </table>

		<div class="notice notice-success">
			<p>WordAi is a third party spinner that allows you to generate spun content on the fly. If you have a WordAi account, input your settings here. If not, leave the boxes blank. <strong>This is NOT a necessity to use WorkHorse and only here for convenience for users who need it.</strong></p>
		</div>

    <p class="submit">
    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>

<h2>Local SEO Countries</h2>
<div class="update-nag">
    <p>
        Here you can select the countries that you would like included in the local SEO feature. It’s recommended to only select the countries that you need as the files can get fairly large. Upon selecting the desired country(s), the files will be downloaded from the WorkHorse cloud and be ready for use within 1-2 minutes.
    </p>
</div>

<?php
    $countries = WorkHorse\Geo::getCountriesList();

    $countryModel = new WorkHorse\Models\Country();
    $installedCountries = $countryModel->all('name');
    $installed = array();

    foreach ($installedCountries as $cc) {
        $installed[] = $cc->name;
    }
?>

<table class="wp-list-table widefat striped" style="margin-top: 20px;">
<thead>
    <tr>
        <td>Country Name</td>
        <td>Filesize</td>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($countries as $country): ?>
        <tr>
            <td><?= $country->country ?></td>
            <td><?= $country->size ?></td>
            <td>
                <?php if (in_array($country->country, $installed)): ?>
                <a href="/wp-admin/admin.php?page=workhorse_settings&action=delete_country&country=<?= $country->code ?>&noheader=true" class="button-primary button-danger">Delete</a>
                <?php else: ?>
                <a href="/wp-admin/admin.php?page=workhorse_settings&action=add_country&country=<?= $country->code ?>&noheader=true" class="button-primary">Download</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php View::endSection('content') ?>

<?php View::make('layouts.main') ?>
