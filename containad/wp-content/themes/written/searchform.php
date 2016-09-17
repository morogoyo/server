<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <fieldset>
        <legend><?php _e( 'Search the site: ', 'written' ); ?></legend>
        <div>
            <label class="screen-reader-text" for="s"><?php _e( 'Search for: ', 'written' ); ?></label>
            <input type="text" value="" name="s" id="s">
            <input type="submit" id="searchsubmit" value="<?php _e( 'Go', 'written' ); ?>">
        </div>
    </fieldset>
</form>