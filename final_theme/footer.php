<?php
/**
 * Footer Template
 *
 * @package YourThemeName
 */
?>

        </div><!-- .content-area -->
    </div><!-- .container -->
</div><!-- #content -->

<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="footer-widgets">
        <div class="container">
            <div class="footer-widget-area">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- .footer-widgets -->

    <div class="site-info">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', 'yourthemename' ); ?></p>
            <p><?php _e( 'Powered by', 'yourthemename' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'yourthemename' ) ); ?>">WordPress</a></p>
        </div>
    </div><!-- .site-info -->
</footer><!-- #site-footer -->

<div class="footer-widgets">
    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <?php dynamic_sidebar( 'footer-1' ); ?>
    <?php endif; ?>
</div>


<?php wp_footer(); ?>
</body>
</html>