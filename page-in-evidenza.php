<?php
if (!defined('ABSPATH'))
    exit;

get_template_part('parts/header');

$args = [
    'post_type' => ['event', 'workshop'],
    // 'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => [
        [
            'key' => 'in_evidenza',
            'value' => '1',
            'compare' => '=',
        ],
    ],
];
$featured = new WP_Query($args);
?>


<main class="pt-[9rem]">

    <div class="px-5">
        <div class="text-center md:text-left">
            <h1 class="mb-15">IN EVIDENZA</h1>
        </div>
    </div>

    <section class="min-h-screen px-5">
        <?php if ($featured->have_posts()):
            while ($featured->have_posts()):
                $featured->the_post();

                $post_type = get_post_type();

                $labels = [
                    'event' => 'Evento',
                    'workshop' => 'Workshop',
                ];
                $label = $labels[$post_type] ?? null;
                ?>
                <div class="flex flex-col md:flex-row items-center w-full gap-0 md:gap-4 lg:h-64 md:hover:bg-red md:hover:text-gray cursor-pointer"
                    onclick="location.href='<?php echo get_permalink(); ?>'">
                    <?php if (has_post_thumbnail()): ?>
                        <div
                            class="w-full h-full md:w-[12.5rem] lg:w-[18.75rem] aspect-square overflow-hidden shrink-0 rounded-b-none rounded-xs">
                            <?php the_post_thumbnail('full', ['class' => 'object-cover w-full h-full']) ?>
                        </div>
                    <?php endif ?>
                    <div
                        class="flex flex-col md:flex-row md:items-center text-center md:text-left w-full h-full gap-4 mb-6 py-6 px-4 border-t-0 border-1 border-dark-gray md:border-0 rounded-t-none rounded-xs">
                        <div class="flex flex-col md:w-1/3 shrink-0">
                            <?php if ($label): ?>
                                <span class="text-sm uppercase tracking-wide opacity-80">
                                    <?= esc_html($label); ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="leading-tight break-words">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                        <div class="flex flex-col items-center md:w-1/3 md:mb-0">
                            <span>
                                <?php
                                if ($post_type == 'event') {
                                    get_template_part('template-parts/dates-times/date-event');
                                } else {
                                    get_template_part('template-parts/dates-times/days-workshop');
                                }
                                ?>
                            </span>
                            <span>
                                <?php
                                if ($post_type == 'event') {
                                    get_template_part('template-parts/dates-times/time-event', get_post_type());
                                } else {
                                    get_template_part('template-parts/dates-times/time-workshop', get_post_type());
                                }
                                ?>
                            </span>
                        </div>
                        <p class="md:w-1/3 line-clamp-3 overflow-hidden">
                            <?php echo wp_strip_all_tags(get_the_excerpt()); ?>
                        </p>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>Nessun contenuto disponibile.</p>
        <?php endif; ?>


    </section>



</main>



<?php
get_template_part('parts/footer');
?>