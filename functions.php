<?php
/*
* My theme functions
*/


// theme title
add_theme_support( 'title-tag');


// Theme CSS and jQuery File Calling
function mmb_css_js_file_calling(){
    wp_enqueue_style( 'mmb-style', get_stylesheet_uri()); //first para define name and 2nd para define location
    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'5.0.2','all'); //new stylesheet needs to reg first then enqueue
    wp_register_style('custom',get_template_directory_uri().'/css/custom.css',array(),'1.0.0','all');
    wp_enqueue_style('bootstrap'); //then enqueue by name
    wp_enqueue_style('custom');

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap',get_template_directory_uri(  ).'/js/bootstrap.js',array(),'5.0.2','true');
    wp_enqueue_script('main',get_template_directory_uri(  ).'/js/main.js',array(),'1.0.0','true');
}

add_action('wp_enqueue_scripts','mmb_css_js_file_calling'); //1st para function reason, 2nd para function name


//Theme Function
function mmb_customizar_register($wp_customize){
    $wp_customize->add_section('mmb_header_area', array(
        'title' =>__('Header Area','mmbtheme1'),
        'description' => 'If you interested to update your header area, you can do it here.'
    ));

    $wp_customize->add_setting('mmb_logo',array(
        'default' => get_bloginfo('template_directory').'/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'mmb_logo',array(
        'lable' => 'Logo Upload',
        'description' => 'If you interested to change or update your logo, you can do it here.',
        'setting' => 'mmb_logo',
        'section' => 'mmb_header_area',
    )));
}

add_action('customize_register','mmb_customizar_register');






?>