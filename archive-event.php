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


<main class="pt-[9rem]">

    <div class="px-5">
        <div class="text-center md:text-left">
            <h1 class="mb-5">EVENTI</h1>
        </div>

        <div class="flex flex-col md:flex-row justify-center md:justify-start gap-2 md:gap-5 mb-10">
            <?php echo (new Button('ATTUALI E PROSSIMI', '#'))->type('primary')->variant('outline')->addClass('toggle-upcoming')->render(); ?>
            <?php echo (new Button('ARCHIVIO', '#'))->type('primary')->variant('outline')->addClass('toggle-archive')->render(); ?>
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
                $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);
                $current_time = current_time('timestamp');
                $event_date_from_timestamp = strtotime($event_date_from);

                if ($event_date_tba == '1') {
                    $event_type = 'upcoming';
                } elseif ($event_date_from_timestamp < $current_time) {
                    $event_type = 'archive';
                } else {
                    $event_type = 'upcoming';
                }
                ?>

                <div class="<?= $event_type ?> flex flex-col items-center md:flex-row w-full gap-4 lg:h-64 hover:bg-red cursor-pointer"
                    onclick="location.href='<?php echo get_permalink(); ?>'">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="rounded-xs w-full md:w-[12.5rem] lg:w-[18.75rem] h-full overflow-hidden shrink-0">
                            <?php the_post_thumbnail('full', ['class' => 'object-cover w-full h-full']) ?>
                        </div>
                    <?php endif ?>
                    <div
                        class="flex flex-col md:flex-row md:items-center text-center md:text-left w-full h-full gap-4 mb-6 py-6 px-4">
                        <h2 class="mt-6 md:mt-0 md:w-1/3 leading-tight break-words shrink-0"><?php the_title(); ?></h2>
                        <p class="md:w-1/3 md:mb-0">
                            <?php if ($event_date_tba == 1): ?>
                                Da annunciare
                            <?php elseif ($event_date_from && $event_date_to): ?>
                                <?php echo esc_html(convert_date_format($event_date_from)) . " → " . esc_html(convert_date_format($event_date_to)); ?>
                            <?php elseif ($event_date_from):
                                echo esc_html(convert_date_format($event_date_from))
                                    ?>
                            <?php endif; ?>
                        </p>
                        <div class="text md md:text-lg md:w-1/3 line-clamp-3 overflow-hidden">
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