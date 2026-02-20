<?php
/**
 * Single template for featured content ("In evidenza")
 * Used by:
 * - events
 * - workshops
 *
 * Artist profiles have their own template: single-artist.php
 */

get_template_part('parts/header');

?>

<main class="bg-gray min-h-screen">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <?php
            $only_has_graphic = (bool) get_post_meta(get_the_ID(), 'only_has_graphic', true);
            $has_thumb = has_post_thumbnail();
            ?>

            <?php if ($only_has_graphic): ?>

                <!-- render this if 'solo grafica' is selected in the Wordpress admin for this event -->
                <section class="mx-6 mt-24">
                    <div class="flex flex-col md:flex-row md:gap-24">
                        <?php if ($has_thumb): ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>
                        <aside class="md:w-80 shrink-0">
                            <?php get_template_part('parts/single-event-or-workshop-page-sections/sidebar'); ?>
                        </aside>
                    </div>
                </section>

            <?php else: ?>
                <!-- hero -->
                <?php
                $section_class = !$has_thumb ? 'mt-40' : '';
                ?>
                <section class="<?php echo esc_attr($section_class); ?>">
                    <?php if ($has_thumb): ?>
                        <?php get_template_part('parts/single-event-or-workshop-page-sections/hero'); ?>
                    <?php endif; ?>
                </section>
                <!-- main content -->
                <section class="m-5 md:m-10">
                    <div class="flex flex-col md:flex-row md:gap-8">
                        <div class="flex flex-col flex-1">
                            <?php get_template_part('parts/single-event-or-workshop-page-sections/content'); ?>
                        </div>
                        <aside class="md:w-80 shrink-0">
                            <?php get_template_part('parts/single-event-or-workshop-page-sections/sidebar'); ?>
                        </aside>

                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; endif; ?>
</main>

<?php get_template_part('parts/footer'); ?>