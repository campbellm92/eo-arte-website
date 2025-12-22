<?php

$event_time_from = get_post_meta(get_the_ID(), '_event_time_from', true);
$event_time_to = get_post_meta(get_the_ID(), '_event_time_to', true);
$event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);

if ($event_time_from && !$event_time_to) {
    echo esc_html(convert_time_format($event_time_from));
} elseif ($event_time_from && $event_time_to) {
    echo 'dalle '
        . esc_html(convert_time_format($event_time_from))
        . " alle "
        . esc_html(convert_time_format($event_time_to));
} elseif (!$event_date_tba && !$event_time_from) {
    echo esc_html__('Ore da annunciare');
}