<?php
if (!defined('ABSPATH'))
    exit;

function enable_featured_images()
{
    add_theme_support('post-thumbnails');
    add_theme_support('post-thumbnails', array('event_item'));
}
add_action('after_setup_theme', 'enable_featured_images');
