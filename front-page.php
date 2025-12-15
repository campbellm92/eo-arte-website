<?php
if (!defined('ABSPATH'))
    exit;
?>

<?php
get_template_part('parts/header');
?>

<main>
    <?php get_template_part('parts/front-page-sections/hero-section') ?>
    <?php get_template_part('parts/front-page-sections/in-evidenza-section') ?>
    <?php get_template_part('parts/front-page-sections/about-section') ?>
</main>

<?php
get_template_part('parts/footer');
?>