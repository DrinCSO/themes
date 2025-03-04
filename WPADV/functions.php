<?php 
function mytheme_enqueue_assets() {
    // Load theme stylesheet
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());

    // Load custom JavaScript file
    wp_enqueue_script(
        'mytheme-script', 
        get_template_directory_uri() . '/assets/js/script.js', 
        array('jquery'), 
        false, 
        true
    );
}

// Hook the function to enqueue scripts and styles
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');


function ds_setup(){
   add_theme_support('menus');
   register_nav_menu('primary', 'Primary Navigation');
}

add_action('init', 'ds_setup');

wp_nav_menu(array('theme_loaction'=>'primary'));
?> 