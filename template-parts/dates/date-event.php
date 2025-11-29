<?php
$event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
$event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
$event_time_from = get_post_meta(get_the_ID(), '_event_time_from', true);
$event_time_to = get_post_meta(get_the_ID(), '_event_time_to', true);
$event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);

if ($event_date_tba == 1) {
    echo "Da annunciare";
} elseif ($event_date_from && $event_date_to) {
    echo esc_html(convert_date_format($event_date_from))
        . " → "
        . esc_html(convert_date_format($event_date_to));
} elseif ($event_date_from) {
    echo esc_html(convert_date_format($event_date_from));
}
?>