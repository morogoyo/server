<?php 

 //echo "<img src="http://tracking.shopstylers.com/aff_i?offer_id=579&aff_id=5759" width="1" height="1" />";
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
<?php endif; ?>