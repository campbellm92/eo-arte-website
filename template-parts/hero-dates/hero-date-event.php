<?php
$date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
$date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
$date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);

if ($date_tba == 1 || empty($date_from)) {
    echo '<span class="text-5xl font-bold text-red date-info">Da annunciare</span>';
    return;
}

$converted_date_from = convert_date_format($date_from);
$converted_date_to = convert_date_format($date_to);

echo '<span class="text-5xl font-bold text-red date-info">' . esc_html($converted_date_from) . ' → ' . esc_html($converted_date_to) . '</span>';