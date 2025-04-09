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
        <div class="text-center md:text-left">
            <h1 class="text-gray mb-5">EVENTI</h1>
        </div>

        <div class="flex justify-center md:justify-start gap-5 mb-10">
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
                <div class="flex flex-col items-center md:flex-row w-full gap-4 lg:h-64 text-gray hover:bg-red cursor-pointer border-b-4"
                    id="events-container" onclick="location.href='<?php echo get_permalink(); ?>'">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="rounded-xs w-full md:w-[12.5rem] lg:w-[18.75rem] h-full overflow-hidden shrink-0">
                            <?php the_post_thumbnail('full', ['class' => 'object-cover w-full h-full']) ?>
                        </div>
                    <?php endif ?>
                    <div class="flex flex-col md:flex-row justify-between items-center w-full h-full gap-4 mb-6 py-6">
                        <h2 class="px-4 mt-6 md:w-1/3 leading-tight break-words shrink-0"><?php the_title(); ?></h2>
                        <p class="sm:px-10 md:w-1/3 text-center md:text-left">
                            <?php if ($event_date_tba == 1): ?>
                                Da annunciare
                            <?php elseif ($event_date_from && $event_date_to): ?>
                                <?php echo esc_html(convert_date_format($event_date_from)) . " → " . esc_html(convert_date_format($event_date_to)); ?>
                            <?php elseif ($event_date_from):
                                echo esc_html(convert_date_format($event_date_from))
                                    ?>
                            <?php endif; ?>
                        </p>
                        <div class="px-4 text-center md:text-left md:w-1/3 line-clamp-3 overflow-hidden">
                            <?php echo get_the_content() ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>

    </section>



</main>

<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".event-toggle-btn");
        const container = document.getElementById("events-container");

        buttons.forEach(button => {
            button.addEventListener("click", () => {

            } )
        })
    })
</script> -->



<?php
get_template_part('parts/footer');
?>