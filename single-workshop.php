<?php
if (!defined('ABSPATH'))
    exit;
?>


<?php get_template_part('parts/header'); ?>


<main>
    <section class="bg-blue min-h-screen">
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
                <?php if (has_post_thumbnail()): ?>
                    <div class="flex items-end w-full min-h-screen bg-no-repeat bg-center bg-cover mb-10"
                        style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
                        <div class="bg-gray max-w-3xl h-auto m-10 rounded-xs absolute bottom-8 z-10">
                            <div class="flex flex-col text-center p-2">
                                <h2 class="text-red"><?php the_title() ?></h2>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="flex flex-cold md:grid md:grid-cols-12 md:gap-4 min-h-screen m-10">
                    <div class="col-span-6">
                        <p class="text-red font-bold">
                            <?php if ($workshop_date_tba == 1): ?>
                                Da annunciare
                            <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                                <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                            <?php elseif ($workshop_date_from):
                                echo esc_html(convert_date_format($workshop_date_from)) ?>
                            <?php endif ?>
                        </p>

                        <div class="text-gray pr-4 md:pr-0"><?php echo wpautop(get_the_content()) ?></div>
                    </div>
                </div>



            <?php endwhile; endif ?>
    </section>
</main>