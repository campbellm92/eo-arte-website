<?php
if (!defined('ABSPATH'))
    exit;

get_template_part('parts/header');


$sections = [
    [
        'title' => 'Donazione',
        'content' => get_field('donazione'),
        'align' => 'left',
    ],
    [
        'title' => '5x1000',
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
