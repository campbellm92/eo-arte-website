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


<main class="bg-blue pt-[5rem] px-10">


    <h1 class="text-gray mb-10">EVENTI</h1>

    <div class="mb-10">
        <?php echo (new Button('ATTUALI E PROSSIMI', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-present-events')->render(); ?>
        <?php echo (new Button('ARCHIVIO', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-past-events')->render(); ?>
    </div>


    <!-- Current and upcoming -->
    <section class="min-h-screen">
        <?php if ($events->have_posts()):
            while ($events->have_posts()):
                $events->the_post(); ?>
                <?php
                $event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
                $event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
                $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true); ?>

                <div class="flex flex-col md:flex-row gap-4 text-gray hover:bg-red cursor-pointer border-b-4">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="rounded-xs max-w-xs ">
                            <?php the_post_thumbnail() ?>
                        <?php endif ?>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                        <h2 class="px-4 mt-6 "><?php the_title(); ?></h2>
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