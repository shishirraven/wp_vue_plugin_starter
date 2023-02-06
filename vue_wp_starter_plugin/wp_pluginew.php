<?php
/*
 Plugin Name: VueWP Starter Plugin
 Author: Shishir Raven
 Description: Your Plugin Description
 version: 1.0

Instructions. 

1. Replace "starterTemp" with your plugin slug on this page. 
2. Replace 'Starter Template' with your Template Name on this page.
*/

// include template page with plugin.
add_filter('theme_page_templates', 'add_newpage_starterTemp', 20, 3 );
function add_newpage_starterTemp($templates)
{
    $templates[ wp_normalize_path(plugin_dir_path( __FILE__ ) . 'templates\template.php')] = 'Starter Template';
    return $templates;
}

add_filter('template_include', 'change_page_template_starterTemp', 99);
function change_page_template_starterTemp($template)
{
    
    $meta = get_post_meta(get_the_ID());
    // echo $meta['_wp_page_template'][0];
    // exit; 
    if(wp_normalize_path(plugin_dir_path( __FILE__ ) . 'templates\template.php')==$meta['_wp_page_template'][0])
    {
        // if (is_page()) {
            $meta = get_post_meta(get_the_ID());
    
            if (!empty($meta['_wp_page_template'][0]) && $meta['_wp_page_template'][0] != $template) {
                $template = $meta['_wp_page_template'][0];
            }
        // }
    }
    return $template;
}


?>