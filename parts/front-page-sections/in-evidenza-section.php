<?php
$args = [
    'post_type' => ['event', 'workshop'],
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$featured = new WP_Query($args);
?>

<section class="md:min-h-screen mt-15 md:mt-50">
    <div class="w-full px-4">
        <div class="flex flex-col md:flex-row justify-between text-center md:text-left items-center pb-6">
            <h1 class="mb-2">IN EVIDENZA</h1>
            <div class="md:mr-6">
                <?php echo (new Button('VEDI TUTTO', home_url('/in-evidenza')))
                    ->type('primary')
                    ->variant('solid')
                    ->render(); ?>
            </div>
        </div>
        <div
            class="flex flex-row gap-4 overflow-x-auto overflow-y-hidden snap-x snap-mandatory touch-pan-x overscroll-x-contain pb-4">
            <?php if ($featured->have_posts()):
                while ($featured->have_posts()):
                    $featured->the_post();
                    get_template_part('template-parts/cards/card-featured');
                endwhile;
            else:
                echo "<p>Nessun contenuto disponibile.</p>";
            endif; ?>

        </div>
    </div>
</section>