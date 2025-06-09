<?php
/**
 * Register Custom Post Types and Taxonomies
 *
 * @package YourThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Register all CPTs and Taxonomies on init
add_action( 'init', 'yourthemename_register_custom_post_types', 0 );

function yourthemename_register_custom_post_types() {

    // === 1. Article Post Type ===
    $article_labels = array(
        'name'               => _x( 'Articles', 'Post Type General Name', 'yourthemename' ),
        'singular_name'      => _x( 'Article', 'Post Type Singular Name', 'yourthemename' ),
        'menu_name'          => __( 'Articles', 'yourthemename' ),
        'name_admin_bar'     => __( 'Article', 'yourthemename' ),
        'add_new'            => __( 'Add New', 'yourthemename' ),
        'add_new_item'       => __( 'Add New Article', 'yourthemename' ),
        'edit_item'          => __( 'Edit Article', 'yourthemename' ),
        'new_item'           => __( 'New Article', 'yourthemename' ),
        'view_item'          => __( 'View Article', 'yourthemename' ),
        'search_items'       => __( 'Search Articles', 'yourthemename' ),
        'not_found'          => __( 'No articles found', 'yourthemename' ),
        'not_found_in_trash' => __( 'No articles found in Trash', 'yourthemename' ),
    );

    $article_args = array(
        'label'               => __( 'Article', 'yourthemename' ),
        'description'         => __( 'News articles and magazine content.', 'yourthemename' ),
        'labels'              => $article_labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author' ),
        'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-document',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_in_rest'        => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'article', $article_args );

    // === 2. Review Post Type ===
    $review_labels = array(
        'name'               => _x( 'Reviews', 'Post Type General Name', 'yourthemename' ),
        'singular_name'      => _x( 'Review', 'Post Type Singular Name', 'yourthemename' ),
        'menu_name'          => __( 'Reviews', 'yourthemename' ),
        'name_admin_bar'     => __( 'Review', 'yourthemename' ),
        'add_new'            => __( 'Add New Review', 'yourthemename' ),
        'add_new_item'       => __( 'Add New Review', 'yourthemename' ),
        'edit_item'          => __( 'Edit Review', 'yourthemename' ),
        'new_item'           => __( 'New Review', 'yourthemename' ),
        'view_item'          => __( 'View Review', 'yourthemename' ),
        'search_items'       => __( 'Search Reviews', 'yourthemename' ),
        'not_found'          => __( 'No reviews found', 'yourthemename' ),
        'not_found_in_trash' => __( 'No reviews found in Trash', 'yourthemename' ),
    );

    $review_args = array(
        'label'               => __( 'Review', 'yourthemename' ),
        'description'         => __( 'Editorial and user reviews.', 'yourthemename' ),
        'labels'              => $review_labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-star-half',
        'show_in_rest'        => true,
        'has_archive'         => true,
    );

    register_post_type( 'review', $review_args );

    // === 3. Custom Taxonomy for Article Topics ===
    $topic_labels = array(
        'name'              => _x( 'Topics', 'taxonomy general name', 'yourthemename' ),
        'singular_name'     => _x( 'Topic', 'taxonomy singular name', 'yourthemename' ),
        'search_items'      => __( 'Search Topics', 'yourthemename' ),
        'all_items'         => __( 'All Topics', 'yourthemename' ),
        'parent_item'       => __( 'Parent Topic', 'yourthemename' ),
        'parent_item_colon' => __( 'Parent Topic:', 'yourthemename' ),
        'edit_item'         => __( 'Edit Topic', 'yourthemename' ),
        'update_item'       => __( 'Update Topic', 'yourthemename' ),
        'add_new_item'      => __( 'Add New Topic', 'yourthemename' ),
        'new_item_name'     => __( 'New Topic Name', 'yourthemename' ),
        'menu_name'         => __( 'Topics', 'yourthemename' ),
    );

    $topic_args = array(
        'hierarchical'      => true,
        'labels'            => $topic_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'topic' ),
    );

    register_taxonomy( 'topic', array( 'article' ), $topic_args );

    // === 4. Event Post Type Example (Bonus) ===
    $event_args = array(
        'labels' => array(
            'name'               => __( 'Events', 'yourthemename' ),
            'singular_name'      => __( 'Event', 'yourthemename' ),
            'add_new'            => __( 'Add New Event', 'yourthemename' ),
            'add_new_item'       => __( 'Add New Event', 'yourthemename' ),
            'edit_item'          => __( 'Edit Event', 'yourthemename' ),
            'new_item'           => __( 'New Event', 'yourthemename' ),
            'view_item'          => __( 'View Event', 'yourthemename' ),
            'search_items'       => __( 'Search Events', 'yourthemename' ),
            'not_found'          => __( 'No events found', 'yourthemename' ),
            'not_found_in_trash' => __( 'No events found in Trash', 'yourthemename' ),
        ),
        'public'              => true,
        'supports'            => array( 'title', 'editor', 'custom-fields' ),
        'menu_icon'           => 'dashicons-calendar',
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'events' ),
        'show_in_rest'        => true,
    );

    register_post_type( 'event', $event_args );
}
