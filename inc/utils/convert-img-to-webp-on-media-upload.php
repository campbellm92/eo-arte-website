<?php

if (!defined('ABSPATH'))
    exit;



function convert_img_to_webp_on_media_upload($upload)
{
    if (in_array($upload['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
        $file_path = $upload['file'];
        if (extension_loaded('imagick') || extension_loaded('gd')) {
            $image_editor = wp_get_image_editor($file_path);
            if (!is_wp_error($image_editor)) {
                $file_info = pathinfo($file_path);
                $dirname = $file_info['dirname'];
                $filename = $file_info['filename'];
                $def_filename = wp_unique_filename($dirname, $filename . '.webp');
                $new_file_path = $dirname . '/' . $def_filename;
                $saved_image = $image_editor->save($new_file_path, 'image/webp');
                if (!is_wp_error($saved_image) && file_exists($saved_image['path'])) {
                    // Update the upload data to use the WebP image
                    $upload['file'] = $saved_image['path'];
                    $upload['url'] = str_replace(basename($upload['url']), basename($saved_image['path']), $upload['url']);
                    $upload['type'] = 'image/webp';

                    // Optionally delete the original file
                    @unlink($file_path);
                }
            }
        }
    }

    return $upload;
}
add_filter('wp_handle_upload', 'convert_img_to_webp_on_media_upload');