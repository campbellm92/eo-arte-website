<?php
if (!defined('ABSPATH'))
    exit;
?>

<?php
get_template_part('parts/header');
?>

<main>
    <?php get_template_part('parts/front-page-sections/hero-section') ?>
    <?php get_template_part('parts/front-page-sections/events-section') ?>
    <?php get_template_part('parts/front-page-sections/about-section') ?>
    <?php get_template_part('parts/front-page-sections/workshops-section') ?>
</main>

<?php
get_template_part('parts/footer');
?>