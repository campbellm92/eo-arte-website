<?php
if (!defined('ABSPATH'))
    exit;


function register_styles()
{

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('eo-main', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('tailwind-styles', get_template_directory_uri() . '/src/output.css', [], '1.0', 'all');

}
add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts()
{
    // gets loaded with wp_footer() in 
    // don't forget to change 'filename'
    wp_enqueue_script('eo-main', get_template_directory_uri() . '/assets/js/filename.js', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'register_scripts');

