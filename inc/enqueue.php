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

