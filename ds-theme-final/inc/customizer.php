<?php

function dsthemefinalmain_customizer($wp_customize) {

    $wp_customize->add_section(

      'sec_copyright',
      array(
        'title'=> 'Copyright Settings',
        'description' => 'Copyright Settings'
      )
      );

      $wp_customize ->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' => 'Copyright X - All Rights Reserved',
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
    
}

add_action('customize_register', 'dsthemefinalmain_customizer');




?> 