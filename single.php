<?php get_template_part('parts/header'); ?>

<main class="bg-gray min-h-screen">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <!-- hero -->
            <section>
                <?php get_template_part('parts/single-event-or-workshop-page-sections/hero'); ?>
            </section>
            <!-- main content -->
            <section class="m-10">
                <div class="flex flex-col md:flex-row md:gap-8">

                    <div class="flex flex-col flex-1">
                        <?php get_template_part('parts/single-event-or-workshop-page-sections/content'); ?>
                    </div>

                    <?php if (get_post_type() === 'event'): ?>
                        <aside class="md:w-80 shrink-0">
                            <?php get_template_part('parts/single-event-or-workshop-page-sections/sidebar-event'); ?>
                        </aside>
                    <?php endif; ?>
                </div>
            </section>
        <?php endwhile; endif; ?>
</main>

<?php get_template_part('parts/footer'); ?>