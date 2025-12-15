<?php

if (!defined('ABSPATH'))
    exit;

$args = [
    'post_type' => 'artist',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
];
$artists = new WP_Query($args);

?>


<?php
get_template_part('parts/header');
?>

<main class="min-h-screen pt-[9rem] text-center md:text-left">
    <section class="p-9 w-full md:max-w-10/12">
        <h1 class="pb-5">colletivo</h1>
        <p class="">It's 3am, time to create some chaos commence midnight zoomies yet i
            is
            not fat, i is fluffy waffles terrorize the hundred-and-twenty-pound rottweiler and steal his bed, not
            sorry. Claws in the eye of the beholder go crazy with excitement when plates are clanked together
            signalling the arrival of cat food my water bowl is clean and freshly replenished, so i'll drink from
            the toilet for the dog smells bad so sun bathe, so intrigued by the shower.</p>
    </section>
    <section class="p-9 w-full">
        <h1 class="mb-10">artisti di EO</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php if ($artists->have_posts()):
                while ($artists->have_posts()):
                    $artists->the_post(); ?>

                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="rounded-full overflow-hidden w-48 h-48 shrink-0">
                            <?php the_post_thumbnail('medium', [
                                'class' => 'w-full h-full object-cover'
                            ]); ?>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold"><?php the_title(); ?></h3>
                            <p class="text-sm opacity-70"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>

                <?php endwhile; endif;
            wp_reset_postdata(); ?>

        </div>
    </section>


</main>


<?php get_template_part('parts/footer'); ?>