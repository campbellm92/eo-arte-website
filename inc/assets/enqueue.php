<?php
if (!defined('ABSPATH'))
    exit;


function register_styles()
{

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('eo-main', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('loader', get_template_directory_uri() . '/assets/css/loader.css', [], 1.0, 'all');
    wp_enqueue_style('tailwind-styles', get_template_directory_uri() . '/src/output.css', [], '1.0', 'all');

}
add_action('wp_enqueue_scripts', 'register_styles', 20);

function register_scripts()
{
    // upcoming + archive buttons to be removed as a feature unless advised otherwise
    // wp_enqueue_script('toggle-upcoming-archive', get_template_directory_uri() . '/assets/js/toggleUpcomingAndArchive.js', [], null, true);
    wp_enqueue_script('toggle-nav', get_template_directory_uri() . '/assets/js/toggleNav.js', [], null, true);

    if (is_front_page()) {
        wp_enqueue_script(
            'loading-screen',
            get_template_directory_uri() . '/assets/js/loadingScreen.js',
            [],
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'register_scripts');