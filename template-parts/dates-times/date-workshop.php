<?php
$date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true);
$date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
$date_to = get_post_meta(get_the_ID(), '_workshop_date_to', true);

if ($date_tba == 1) {
    echo "Da annunciare";
    return;
}

if ($date_from && $date_to) {
    echo esc_html(convert_date_format($date_from))
        . ' → '
        . esc_html(convert_date_format($date_to));
} elseif ($date_from) {
    echo esc_html(convert_date_format($date_from));
}
