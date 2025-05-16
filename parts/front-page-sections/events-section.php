<!-- events section -->
<?php
// custom WP query
$args = [
    'post_type' => 'event',
    'posts_per_page' => 3,
    // 'meta_key' => '_event_date_time',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$events = new WP_Query($args);
?>

<section class="min-h-screen">
    <div class="bg-blue min-h-screen w-full py-10 px-4">

        <div class="flex flex-col md:flex-row justify-between text-center md:text-left items-center pb-6">
            <h1 class="text-gray mb-2">PROSSIMI EVENTI</h1>
            <div class="md:mr-6">
                <!-- CHANGE URL TO GO TO ALL EVENTS PAGE -->
                <?php echo (new Button('VEDI TUTTI', home_url('/eventi')))->type('neutral')->variant('outline')->addClass('')->render(); ?>
            </div>
        </div>

        <div
            class="flex flex-col md:flex-row items-center md:items-stretch overflow-x-auto space-y-6 md:space-y-0 md:space-x-4 snap-x-4 pb-6 scrollbar-hide">
            <?php if ($events->have_posts()):
                while ($events->have_posts()):
                    $events->the_post(); ?>
                    <?php
                    $event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
                    $event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
                    $event_time_from = get_post_meta(get_the_ID(), '_event_time_from', true);
                    $event_time_to = get_post_meta(get_the_ID(), '_event_time_to', true);
                    $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);
                    ?>
                    <div
                        class="flex flex-col flex-shrink-0 w-11/12 sm:w-full md:w-2/3 lg:w-1/2 h-auto md:mr-10 bg-blue border-8 border-gray rounded-xs snap-start">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="flex-shrink-0">
                                <div class="h-64 md:h-90 overflow-hidden">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']) ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="flex flex-col text-center md:text-left flex-grow p-6">
                            <h2 class="text-gray pb-2"><?php the_title(); ?></h2>
                            <p class="small-text text-light-gray font-semibold">
                                <?php if ($event_date_tba == 1): ?>
                                    Da annunciare
                                <?php elseif ($event_date_from && $event_date_to): ?>
                                    <?php echo esc_html(convert_date_format($event_date_from)) . " → " . esc_html(convert_date_format($event_date_to)); ?>
                                <?php elseif ($event_date_from):
                                    echo esc_html(convert_date_format($event_date_from))
                                        ?>
                                <?php endif; ?>

                            </p>
                            <p class="small-text text-gray font-semibold pb-2">
                                <?php if ($event_time_from && $event_time_to): ?>
                                    <?php echo esc_html("dalle " . convert_time_format($event_time_from)) . " alle " . esc_html(convert_time_format($event_time_to)); ?>
                                <?php elseif ($event_time_from):
                                    echo esc_html("dalle " . convert_time_format($event_time_from))
                                        ?>
                                <?php endif; ?>

                            </p>

                            <!-- will need to add logic for time -->
                            <!-- copy and paste above and adjust for time -->


                            <div class="text-gray line-clamp-3">
                                <!--needs a fix here - atm not making paras  -->
                                <?php echo (get_the_content()) ?>
                            </div>
                            <div class="mt-auto">
                                <?php echo (new Button('SCOPRI DI PIÙ', get_permalink()))->type('neutral')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
    </div>

</section>