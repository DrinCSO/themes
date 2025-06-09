<?php
/**
 * Sidebar Template
 *
 * @package YourThemeName
 */
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <div class="widget">
            <h2 class="widget-title"><?php _e( 'Example Widget', 'yourthemename' ); ?></h2>
            <p><?php _e( 'This is a widget placeholder. Add widgets from your dashboard.', 'yourthemename' ); ?></p>
        </div>
    <?php endif; ?>
</aside><!-- #secondary -->

<aside id="secondary" class="widget-area" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
</aside>




