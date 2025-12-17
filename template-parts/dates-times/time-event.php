<?php

$event_time_from = get_post_meta(get_the_ID(), '_event_time_from', true);
$event_time_to = get_post_meta(get_the_ID(), '_event_time_to', true);

if ($event_time_from && !$event_time_to) {
    echo esc_html(convert_time_format($event_time_from));
} elseif ($event_time_from && $event_time_to) {
    echo esc_html(convert_time_format($event_time_from))
        . " → "
        . esc_html(convert_time_format($event_time_to));
} else {
    echo esc_html__('Ore da annunciare');
}