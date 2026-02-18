<?php
if (!defined('ABSPATH'))
    exit;

get_template_part('parts/header');


$sections = [
    [
        'title' => 'Sostieni EO ARTE',
        'content' => get_field('donazione'),
        'align' => 'left',
    ],
    [
        'title' => 'Destina il 5×1000 a EO ARTE',
        'content' => get_field('five_x_onethousand'),
        'align' => 'right',
    ],
];

get_template_part(
    'template-parts/layouts/static-page-sections',
    null,
    ['sections' => $sections]
);

get_template_part('parts/footer');
