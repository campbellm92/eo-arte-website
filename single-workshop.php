<?php
if (!defined('ABSPATH'))
    exit;
?>


<?php get_template_part('parts/header'); ?>


<main>
    <section class="bg-blue min-h-screen p-[4rem]">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <?php
                $workshop_date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
                $workshop_date_to = get_post_meta(get_the_ID(), '_workshop_date_to', true);
                $workshop_time_from = get_post_meta(get_the_ID(), '_workshop_time_from', true);
                $workshop_time_to = get_post_meta(get_the_ID(), '_workshop_time_to', true);
                $workshop_days = get_post_meta(get_the_ID(), '_workshop_days', true);
                $workshop_date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true); ?>
                <div class="">
                    <h2 class="text-gray pb-4"><?php the_title() ?></h2>
                    <div class="text-gray"><?php echo wpautop(get_the_content()) ?></div>
                    <?php if ($workshop_date_tba == 1): ?>
                        Da annunciare
                    <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                        <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                    <?php elseif ($workshop_date_from):
                        echo esc_html(convert_date_format($workshop_date_from)) ?>
                    <?php endif ?>
                </div>
            <?php endwhile; endif ?>
    </section>
</main>