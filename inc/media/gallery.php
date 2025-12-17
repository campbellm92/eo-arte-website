<?php
add_filter('shortcode_atts_gallery', function ($out) {
    $out['size'] = 'medium_large';
    return $out;
});
?>