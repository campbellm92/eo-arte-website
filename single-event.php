<?php
if (!defined('ABSPATH'))
    exit;
?>

<?php get_template_part('parts/header'); ?>

<main>
    <section class="bg-gray min-h-screen">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <?php
                $event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
                $event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
                $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true); ?>
                <div>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="flex items-end w-full min-h-screen bg-no-repeat bg-center bg-cover mb-10"
                            style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">

                            <?php
                            $date_string = convert_to_day_and_short_month($event_date_from);
                            $parts = explode(' ', $date_string);
                            ?>
                            <div class="bg-gray max-w-3xl h-auto m-10 rounded-xs">

                                <div class="flex flex-col text-center p-2">
                                    <?php if (empty($date_string)): ?>
                                        <span class="text-5xl font-bold text-red">Da annunciare</span>
                                    <?php else: ?>
                                        <span class="text-5xl font-bold text-red pb-0"><?php echo $parts[0] ?></span>
                                        <span class="text-5xl font-bold text-red"><?php echo $parts[1] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:grid md:grid-cols-12 md:gap-4 min-h-screen">
                            <div class="col-span-8 pl-4 md:pl-8">
                                <h2 class="text-dark-gray pb-4"><?php the_title() ?></h2>
                                <div class="text-dark-gray pr-4 md:pr-0"><?php echo wpautop(get_the_content()) ?></div>
                            </div>

                            <div class="max-h-fit p-4 mt-4 bg-light-gray md:col-span-4 md:col-start-10 md:mt-0 md:mr-4">
                                <p class="text-red font-bold">
                                    <?php if ($event_date_tba == 1): ?>
                                        Da annunciare
                                    <?php elseif ($event_date_from && $event_date_to): ?>
                                        <?php echo esc_html(convert_date_format($event_date_from)) . " → " . esc_html(convert_date_format($event_date_to)); ?>
                                    <?php elseif ($event_date_from):
                                        echo esc_html(convert_date_format($event_date_from))
                                            ?>
                                    <?php endif; ?>
                                </p>

                                <div>
                                    <p class="small-text font-semibold text-blue">
                                        EO ARTE
                                        via XX settembre, 112, ASTI.
                                    </p>
                                </div>

                                <hr class="text-red mb-4">

                                <?php
                                $artist = get_field('artist');
                                if ($artist): ?>

                                    <div>
                                        <div class="flex flex-col items-center text-center ">
                                            <div class="rounded-full overflow-hidden w-48 h-48">
                                                <?php echo get_the_post_thumbnail($artist, 'medium', ['class' => 'w-full h-full object-cover']); ?>
                                            </div>
                                        </div>

                                        <p class="small-text text-center">
                                            <?php echo apply_filters('the_content', $artist->post_content); ?>
                                        </p>
                                    </div>

                                <?php endif; ?>


                            </div>
                        </div>

                    <?php endif ?>

                </div>







            <?php endwhile; endif; ?>
    </section>


</main>



<?php get_template_part('parts/footer'); ?>