<div class="relative group flex-shrink-0 w-11/12 sm:w-full md:w-2/3 lg:w-1/2 
            h-[32rem] md:h-[40rem] rounded-xs overflow-hidden snap-start">

    <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('large', [
            'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105'
        ]); ?>
    <?php endif; ?>
    <div
        class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-gray p-6 text-center">
        <h2 class="text-2xl font-bold mb-2"><?php the_title(); ?></h2>
        <p class="text-sm font-semibold mb-4">
            <?php
            $type = get_post_type();

            if ($type === 'event') {
                get_template_part('template-parts/dates/date-event');
            } elseif ($type === 'workshop') {
                get_template_part('template-parts/dates/date-workshop');
            }
            ?>
        </p>
        <div class="line-clamp-3 mb-4 px-4">
            <?php echo wp_kses_post(get_the_content()); ?>
        </div>
        <?php echo (new Button('SCOPRI DI PIÙ', get_permalink()))
            ->type('primary-solid')
            ->variant('outline')
            ->addClass('mt-2')
            ->render(); ?>
    </div>
</div>