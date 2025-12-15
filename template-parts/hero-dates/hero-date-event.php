<?php
$date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
$date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);

if ($date_tba == 1 || empty($date_from)) {
    echo '<span class="text-5xl font-bold text-red date-info">Da annunciare</span>';
    return;
}

$date_string = convert_to_day_and_short_month($date_from);
$parts = explode(' ', $date_string);

echo '<span class="text-5xl font-bold text-red date-info">' . esc_html($parts[0]) . '</span>';
echo '<span class="text-5xl font-bold text-red date-info">' . esc_html($parts[1]) . '</span>';
