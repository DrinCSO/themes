<?php

function dsthemefinalmain_customizer($wp_customize) {

    $wp_customize->add_section(

      'sec_hero',
      array(
        'title'=> 'Copyright Settings',
        'description' => 'Copyright Settings'
      )
      );

      $wp_customize ->add_setting(
        'set_hero_title',
        array(
            'type' => 'theme_mod',
            'default' => 'Please, add some title',
            'sanitize_callback' => 'santize_text_field'
        )
        );
     
        $wp_customize->add_control(
            'set_copyright',
            array(
                'label' => 'Copyright Information',
                'description' => 'Please, type your copyright here',
                'section' => 'sec_copyright',
                'type' => 'text'
            )
            );
    


    $wp_customize->add_control(

      'set_hero_height',
      array(
        label
      )
      );

      $wp_customize ->add_setting(
        'set_hero_title',
        array(
            'type' => 'theme_mod',
            'default' => 'Please, add some title',
            'sanitize_callback' => 'santize_text_field'
        )
        );
    
        $wp_customize->add_control(
            'set_copyright',
            array(
                'label' => 'Copyright Information',
                'description' => 'Please, type your copyright here',
                'section' => 'sec_copyright',
                'type' => 'text'
            )
            );

            // 3. Blog
	$wp_customize->add_section( 
    'sec_blog', 
    array(
    'title' => 'Blog Section'
) );

        // Posts per page
        $wp_customize->add_setting( 
            'set_per_page', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 
            'set_per_page', 
            array(
                'label' => 'Posts per page',
                'description' => 'How many items to display in the post list?',			
                'section' => 'sec_blog',
                'type' => 'number'
        ) );

        // Post categories to include
        $wp_customize->add_setting( 
            'set_category_include', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_include', 
            array(
                'label' => 'Post categories to include',
                'description' => 'Comma separated values or single category ID',
                'section' => 'sec_blog',
                'type' => 'text'
        ) );	

        // Post categories to exclude
        $wp_customize->add_setting( 
            'set_category_exclude', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_exclude', 
            array(
                'label' => 'Post categories to exclude',
                'description' => 'Comma separated values or single category ID',			
                'section' => 'sec_blog',
                'type' => 'text'
        ) ); 

}

add_action('customize_register', 'dsthemefinalmain_customizer');




?> 
