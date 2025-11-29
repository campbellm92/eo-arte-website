<?php
// Fetch meta
$days = get_post_meta(get_the_ID(), '_workshop_days', true);
$date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
$date_to = get_post_meta(get_the_ID(), '_workshop_date_to', true);
$time_from = get_post_meta(get_the_ID(), '_workshop_time_from', true);
$time_to = get_post_meta(get_the_ID(), '_workshop_time_to', true);
$date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true);

// 1. TBA override
if ($date_tba == 1) {
    echo "Da annunciare";
    return;
}

// 2. Days (array)
if (!empty($days) && is_array($days)) {
    // Implode into a readable comma-separated list
    echo '<div>' . esc_html(implode(', ', $days)) . '</div>';
}

// 3. Date range or single date
if ($date_from && $date_to) {
    echo '<div>'
        . esc_html(convert_date_format($date_from))
        . ' → '
        . esc_html(convert_date_format($date_to))
        . '</div>';
} elseif ($date_from) {
    echo '<div>' . esc_html(convert_date_format($date_from)) . '</div>';
}

// 4. Time range
if ($time_from && $time_to) {
    echo '<div>dalle '
        . esc_html(convert_time_format($time_from))
        . ' alle '
        . esc_html(convert_time_format($time_to))
        . '</div>';
} elseif ($time_from) {
    echo '<div>dalle ' . esc_html(convert_time_format($time_from)) . '</div>';
}
?>