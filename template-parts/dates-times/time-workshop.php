<?php
$time_from = get_post_meta(get_the_ID(), '_workshop_time_from', true);
$time_to = get_post_meta(get_the_ID(), '_workshop_time_to', true);

if ($time_from && $time_to) {
    echo 'dalle '
        . esc_html(convert_time_format($time_from))
        . ' alle '
        . esc_html(convert_time_format($time_to));
} elseif ($time_from) {
    echo esc_html(convert_time_format($time_from));
}
