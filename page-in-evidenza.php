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
    'post_type' => ['event', 'workshop'],
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => [
        [
            'key' => 'in_evidenza',
            'value' => '1',
        ],
    ],
];
$featured = new WP_Query($args);
?>


<main class="pt-[9rem]">

    <div class="px-5">
        <div class="text-center md:text-left">
            <h1 class="mb-15">in evidenza</h1>
        </div>
    </div>
    =
    <section class="min-h-screen px-5">
        <?php if ($featured->have_posts()):
            while ($featured->have_posts()):
                $featured->the_post(); ?>
                <?php
                $post_type = get_post_type();
                ?>

                <div class="<?= $event_type ?> flex flex-col items-center md:flex-row w-full gap-4 lg:h-64 hover:bg-red hover:text-gray cursor-pointer"
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
                            <?php
                            get_template_part('parts/date', $post_type);
                            ?>
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