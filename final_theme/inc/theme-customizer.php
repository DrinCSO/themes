<?php
/**
 * Theme Customizer settings
 *
 * @package YourThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function yourthemename_customize_register( $wp_customize ) {

    // === Site Identity Transport ===
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    // === Layout Section ===
    $wp_customize->add_section( 'yourthemename_layout_section', array(
        'title'       => __( 'Layout Settings', 'yourthemename' ),
        'priority'    => 30,
        'description' => __( 'Adjust sidebar and content layout options.', 'yourthemename' ),
    ) );

    $wp_customize->add_setting( 'yourthemename_display_sidebar', array(
        'default'           => true,
        'sanitize_callback' => 'yourthemename_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'yourthemename_display_sidebar', array(
        'label'    => __( 'Display Sidebar on Pages', 'yourthemename' ),
        'section'  => 'yourthemename_layout_section',
        'type'     => 'checkbox',
    ) );

    // === Footer Section ===
    $wp_customize->add_section( 'yourthemename_footer_section', array(
        'title'       => __( 'Footer Settings', 'yourthemename' ),
        'priority'    => 40,
        'description' => __( 'Customize footer text and layout.', 'yourthemename' ),
    ) );

    $wp_customize->add_setting( 'yourthemename_footer_text', array(
        'default'           => sprintf( __( '© %s YourThemeName. All rights reserved.', 'yourthemename' ), date( 'Y' ) ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'yourthemename_footer_text', array(
        'label'    => __( 'Footer Text', 'yourthemename' ),
        'section'  => 'yourthemename_footer_section',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'yourthemename_customize_register' );

/**
 * Sanitize checkbox input (returns true/false)
 */
function yourthemename_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
