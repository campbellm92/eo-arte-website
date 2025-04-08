<?php
if (!defined('ABSPATH'))
    exit;

function enable_featured_images()
{
    add_theme_support('post-thumbnails');
    add_theme_support('post-thumbnails', array('event_item'));
}
add_action('after_setup_theme', 'enable_featured_images');

// function set_default_featured_image($html, $post_id, $post_thumbnail, $size, $attr)
// {
//     if (empty($post_thumbnail_id)) {
//         $default_image_url = 'http://spazio-eo.local/wp-content/uploads/2025/03/eo-arte-outside.webp';
//         $html = '<img src="' . esc_url($default_image_url) . '" class="wp-post-image" alt="Default Image"/>';

//     }
//     return $html;
// }
// add_filter('post_thumbnail_html', 'set_default_featured_image', 10, 5);