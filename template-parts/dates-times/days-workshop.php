<?php
$days = get_post_meta(get_the_ID(), '_workshop_days', true);

if (!empty($days) && is_array($days)) {
    echo esc_html(implode(', ', $days));
}
