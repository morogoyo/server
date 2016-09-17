    </div>
    <footer id="footer">
        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_template_directory_uri() ); ?>" rel="home"><?php get_template_directory_uri(); ?></a> <?php printf( __( 'is proudly powered by ', 'written' ) ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'written' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'written' ); ?>" rel="generator"><?php printf( __( '%s', 'written' ), 'WordPress' ); ?></a> | <a href="<?php echo esc_url( __( 'http://albertoramacciotti.com', 'written' ) ); ?>" title="<?php esc_attr_e( 'alberto ramacciotti homepage', 'written' ); ?>" class="ar"><img src="<?php get_template_directory_uri(); ?>/i/ar-logo-icon.jpg" alt="alberto ramacciotti logo"></a></p>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>