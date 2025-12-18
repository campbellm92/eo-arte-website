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

$has_thumb = has_post_thumbnail();
?>

<main class="bg-gray min-h-screen">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
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
            <section class="m-10">
                <div class="flex flex-col md:flex-row md:gap-8">

                    <div class="flex flex-col flex-1">
                        <?php get_template_part('parts/single-event-or-workshop-page-sections/content'); ?>
                    </div>

                    <aside class="md:w-80 shrink-0">
                        <?php get_template_part('parts/single-event-or-workshop-page-sections/sidebar'); ?>
                    </aside>

                </div>
            </section>
        <?php endwhile; endif; ?>
</main>

<?php get_template_part('parts/footer'); ?>