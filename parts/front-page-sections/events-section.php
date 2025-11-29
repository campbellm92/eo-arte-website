<?php
// Unified Featured Query (Events + Workshops)
$args = [
    'post_type' => ['event', 'workshop'],
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$featured = new WP_Query($args);
?>

<section class="min-h-screen mt-50">
    <div class="min-h-screen w-full px-4">
        <div class="flex flex-col md:flex-row justify-between text-center md:text-left items-center pb-6">
            <h1 class="mb-2">in evidenza*</h1>
            <div class="md:mr-6">
                <?php echo (new Button('VEDI TUTTO', home_url('/eventi')))
                    ->type('primary')
                    ->variant('solid')
                    ->render(); ?>
            </div>
        </div>
        <div
            class="flex flex-col md:flex-row items-center md:items-stretch overflow-x-auto space-y-6 md:space-y-0 md:space-x-4 snap-x-4 pb-6 scrollbar-hide">
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