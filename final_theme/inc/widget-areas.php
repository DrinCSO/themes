<?php
/**
 * Widget Areas
 *
 * @package YourThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! function_exists( 'yourthemename_register_widget_areas' ) ) {
    function yourthemename_register_widget_areas() {

        // Main Sidebar
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'yourthemename' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Primary sidebar that appears on posts and pages.', 'yourthemename' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        // Homepage Sidebar
        register_sidebar( array(
            'name'          => __( 'Homepage Sidebar', 'yourthemename' ),
            'id'            => 'sidebar-home',
            'description'   => __( 'Sidebar specifically for the front page.', 'yourthemename' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        // Footer Widgets - Column 1
        register_sidebar( array(
            'name'          => __( 'Footer Column 1', 'yourthemename' ),
            'id'            => 'footer-1',
            'description'   => __( 'First column in the footer.', 'yourthemename' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        // Footer Widgets - Column 2
        register_sidebar( array(
            'name'          => __( 'Footer Column 2', 'yourthemename' ),
            'id'            => 'footer-2',
            'description'   => __( 'Second column in the footer.', 'yourthemename' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        // Footer Widgets - Column 3
        register_sidebar( array(
            'name'          => __( 'Footer Column 3', 'yourthemename' ),
            'id'            => 'footer-3',
            'description'   => __( 'Third column in the footer.', 'yourthemename' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        // Footer Bottom (Copyright)
        register_sidebar( array(
            'name'          => __( 'Footer Bottom', 'yourthemename' ),
            'id'            => 'footer-bottom',
            'description'   => __( 'Appears below footer columns for copyright or extra text.', 'yourthemename' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<span class="widget-title">',
            'after_title'   => '</span>',
        ) );
    }
    add_action( 'widgets_init', 'yourthemename_register_widget_areas' );
}
