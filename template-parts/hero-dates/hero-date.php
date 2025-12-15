<?php
$post_type = get_post_type();

if ($post_type === 'event') {
    get_template_part('template-parts/hero-dates/hero-date-event');
} elseif ($post_type === 'workshop') {
    get_template_part('template-parts/hero-dates/hero-date-workshop');
}
