<?php
if (!defined('ABSPATH'))
    exit;

get_template_part('parts/header');


$sections = [
    [
        'title' => 'Chi Siamo',
        'content' => get_field('chi_siamo'),
        'align' => 'left',
    ],
    [
        'title' => 'Servizi',
        'content' => get_field('servizi'),
        'align' => 'right',
    ],
    [
        'title' => 'La storia di EO Baussano',
        'content' => get_field('la_storia_di_eo_baussano'),
        'align' => 'left',
    ],
];

get_template_part(
    'template-parts/layouts/static-page-sections',
    null,
    ['sections' => $sections]
);

get_template_part('parts/footer');
