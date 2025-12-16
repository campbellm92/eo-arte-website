<?php if (has_post_thumbnail()): ?>
    <div class="flex items-end w-full min-h-screen bg-no-repeat bg-center bg-cover mb-10"
        style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
        <div class="bg-gray max-w-3xl h-auto m-10 rounded-xs absolute bottom-8 z-10">
            <div class="flex flex-col text-center p-2">
                <?php get_template_part('template-parts/hero-dates/hero-date'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>