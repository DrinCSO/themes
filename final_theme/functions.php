<?php
/**
 * functions.php
 *
 * Core theme functions for your News Magazine WordPress theme.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// THEME CONSTANTS
if ( ! defined( 'YOUR_THEME_VERSION' ) ) {
    define( 'YOUR_THEME_VERSION', '1.0.0' );
    define( 'YOUR_THEME_DIR', get_template_directory() );
    define( 'YOUR_THEME_URI', get_template_directory_uri() );
}

// ------------------------------
// THEME SETUP
// ------------------------------
function yourtheme_setup() {
    load_theme_textdomain( 'yourtheme', YOUR_THEME_DIR . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'featured-large', 1024, 640, true );
    add_image_size( 'featured-small', 400, 300, true );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'yourtheme' ),
        'footer'  => __( 'Footer Menu', 'yourtheme' )
    ) );

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'yourtheme_setup' );

// ------------------------------
// ENQUEUE STYLES AND SCRIPTS
// ------------------------------
function yourtheme_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style( 'yourtheme-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', false );

    // Bootstrap 5 CSS
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );

    // Theme CSS (always last so it can override)
    wp_enqueue_style( 'yourtheme-style', YOUR_THEME_URI . '/assets/css/style.css', array('bootstrap-css'), YOUR_THEME_VERSION );

    // jQuery (already included in WordPress)

    // Bootstrap 5 JS + Popper
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );

    // Theme JS
    wp_enqueue_script( 'yourtheme-main', YOUR_THEME_URI . '/assets/js/main.js', array( 'jquery' ), YOUR_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'yourtheme_enqueue_scripts' );

// ------------------------------
// REGISTER WIDGET AREAS
// ------------------------------
function yourtheme_register_widget_areas() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'yourtheme' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Appears on posts and pages.', 'yourtheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title h5 mb-3">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widgets', 'yourtheme' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Footer widget area.', 'yourtheme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title h6 mb-2">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'yourtheme_register_widget_areas' );

function ds_theme_enqueue_assets() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' );
    wp_enqueue_style( 'ds-theme-style', get_stylesheet_uri() );

    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'ds_theme_enqueue_assets' );

function yourtheme_remove_recent_posts_from_sidebar_main() {
    $sidebars_widgets = wp_get_sidebars_widgets();

    // Only act if sidebar-main has widgets
    if ( isset( $sidebars_widgets['sidebar-main'] ) ) {
        foreach ( $sidebars_widgets['sidebar-main'] as $index => $widget_id ) {
            // recent-posts-2, recent-posts-3, etc.
            if ( strpos( $widget_id, 'recent-posts' ) !== false ) {
                unset( $sidebars_widgets['sidebar-main'][ $index ] );
            }
        }

        // Save the new widget setup
        wp_set_sidebars_widgets( $sidebars_widgets );
    }
}
add_action( 'widgets_init', 'yourtheme_remove_recent_posts_from_sidebar_main', 11 );




// ------------------------------
// INCLUDE ADDITIONAL FILES
// ------------------------------
require_once YOUR_THEME_DIR . '/inc/custom-post-types.php';
require_once YOUR_THEME_DIR . '/inc/theme-customizer.php';
require_once YOUR_THEME_DIR . '/inc/widget-areas.php';
require_once YOUR_THEME_DIR . '/inc/helpers.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';




