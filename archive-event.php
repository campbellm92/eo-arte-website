<!-- All events page, including present, upcoming and archived -->
<?php
if (!defined('ABSPATH'))
    exit;
?>


<?php
get_template_part('parts/header');
?>

<?php
// custom WP query
$args = [
    'post_type' => 'event',
    // 'posts_per_page' => 3,
    // 'meta_key' => '_event_date_time',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$events = new WP_Query($args);
?>


<main class="bg-blue pt-[5rem]">

    <div class="px-5">
        <h1 class="text-gray mb-5">EVENTI</h1>

        <div class="mb-10">
            <?php echo (new Button('ATTUALI E PROSSIMI', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-present-events')->render(); ?>
            <?php echo (new Button('ARCHIVIO', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-past-events')->render(); ?>
        </div>

    </div>


    <!-- Current and upcoming -->
    <section class="min-h-screen px-5">
        <?php if ($events->have_posts()):
            while ($events->have_posts()):
                $events->the_post(); ?>
                <?php
                $event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
                $event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
                $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true); ?>


                <div
                    class="flex flex-col items-center md:flex-row w-full gap-4 lg:h-64 text-gray hover:bg-red cursor-pointer border-b-4 py-6">
                    <?php if (has_post_thumbnail()): ?>
                        <div
                            class="rounded-xs w-full md:w-[12.5rem] md:h-[10rem] lg:w-[18.75rem] lg:h-[12.5rem] overflow-hidden shrink-0">
                            <?php the_post_thumbnail() ?>
                        <?php endif ?>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                        <h2 class="px-4 mt-6 max-w-[20ch] leading-tight break-words shrink-0"><?php the_title(); ?></h2>
                        <p class="sm:px-10">
                            <?php if ($event_date_tba == 1): ?>
                                Da annunciare
                            <?php elseif ($event_date_from && $event_date_to): ?>
                                <?php echo esc_html($event_date_from) . " → " . esc_html($event_date_to); ?>
                            <?php elseif ($event_date_from):
                                echo esc_html($event_date_from)
                                    ?>
                            <?php endif; ?>
                        </p>
                        <div class="sm:px-10 line-clamp-2">
                            <?php echo get_the_content() ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>

    </section>



</main>



<?php
get_template_part('parts/footer');
?>