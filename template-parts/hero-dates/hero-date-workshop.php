<?php
$days = get_post_meta(get_the_ID(), '_workshop_days', true);
$date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true);

if ($date_tba === 1 || empty($days)) {
    echo '<span class="text-3xl font-bold text-red">Da annunciare</span>';
    return;
}

$days_label = is_array($days)
    ? implode(', ', $days)
    : $days;

echo '<span class="text-4xl font-bold text-red">' . esc_html($days_label) . '</span>';
