<!-- events section -->
<?php
$args = [
    'post_type' => 'event_item',
    'posts_per_page' => 3,
    'meta_key' => '_event_date_time',
    'orderby' => 'meta_value',
    'order' => 'ASC',
];
$events = new WP_Query($args);



?>

<section class="min-h-screen">
    <div class="bg-blue min-h-screen m-10 p-4 rounded-xs">

        <h1 class="text-red pb-6">EVENTI</h1>

        <div class="cards-container grid grid-cols-1 xl:grid-cols-3 lg:grid-cols-2 gap-4 pb-6">
            <?php if ($events->have_posts()):
                while ($events->have_posts()):
                    $events->the_post(); ?>
                    <?php
                    $event_date_from = get_post_meta(get_the_ID(), '_event_date_from', true);
                    $event_date_to = get_post_meta(get_the_ID(), '_event_date_to', true);
                    $event_date_tba = get_post_meta(get_the_ID(), '_event_date_tba', true);
                    ?>
                    <div class="card bg-gray max-w-xl border-8  border-red rounded-xs">
                        <div class="px-6 pt-6">
                            <?php the_post_thumbnail() ?>
                        </div>
                        <div class="card-content p-6">
                            <h2 class="event-title"><?php the_title(); ?></h2>
                            <p class="card-time-date text-red pb-2">
                                <?php if ($event_date_tba == 1): ?>
                                    Da annunciare
                                <?php elseif ($event_date_from && $event_date_to): ?>
                                    <?php echo esc_html($event_date_from) . " → " . esc_html($event_date_to); ?>
                                <?php elseif ($event_date_from):
                                    echo esc_html($event_date_from)
                                        ?>
                                <?php endif; ?>
                            </p>
                            <p class="description"><?php the_content() ?></p>
                            <div class="btn-container">
                                <?php echo (new Button('SCOPRI DI PIÙ', ''))->type('secondary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>


    </div>

</section>