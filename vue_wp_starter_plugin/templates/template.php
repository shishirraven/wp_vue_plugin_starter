<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iamshishir
 */
wp_dequeue_style('iamshishir-style');
function my_admin_bar_init()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('admin_bar_init', 'my_admin_bar_init', 20, 1000);

remove_action('wp_footer', 'wp_admin_bar_render', 1000);


// dequeue the default style
add_action('wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 100);
function mywptheme_child_deregister_styles()
{

    // echo "shishir"; die;

    //  Removing all Scripts. 
    global $wp_scripts;
    foreach ($wp_scripts->queue as $script) :
        wp_dequeue_script($script);
    endforeach;

    // Removing all Styles
    global $wp_styles;
    foreach ($wp_styles->queue as $style) :
        wp_dequeue_style($style);
    endforeach;

    
    wp_enqueue_script('tailwindjs', plugin_dir_url(__FILE__) . 'public/script.js', array(), '1.0.0', true);


   

    wp_enqueue_style('vueappcss', plugin_dir_url(__DIR__ ) . 'vueapp/dist/assets/index.css', array(), '1.0.0', 'all');
    wp_enqueue_script('vueappjs', plugin_dir_url(__DIR__ ) . 'vueapp/dist/assets/index.js', array(), '1.0.0', true);
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="app"></div>
    <?php
    wp_footer();
