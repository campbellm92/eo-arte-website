<?php get_template_part('parts/header'); ?>

<main>
    <section class="bg-gray min-h-screen">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <!-- import hero section -->
                <?php get_template_part('parts/in-evidenza-page-sections/hero'); ?>
                <!-- main content -->
                <div class="flex flex-col md:grid md:grid-cols-12 md:gap-4 min-h-screen m-10">
                    <?php get_template_part('parts/in-evidenza-page-sections/content'); ?>
                    <?php if (get_post_type() === 'event'): ?>
                        <?php get_template_part('parts/in-evidenza-page-sections/sidebar-event'); ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; endif; ?>
    </section>
</main>

<?php get_template_part('parts/footer'); ?>