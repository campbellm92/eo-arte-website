<?php
$date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
$date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true);

if ($date_tba == 1 || empty($date_from)) {
    echo '<span class="text-3xl font-bold text-red">Workshop</span>';
    return;
}

$date_string = convert_to_day_and_short_month($date_from);
echo '<span class="text-4xl font-bold text-red">' . esc_html($date_string) . '</span>';
