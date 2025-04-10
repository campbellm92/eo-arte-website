<!-- courses section -->
<?php
$args = [
    'post_type' => 'workshop',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$workshops = new WP_Query($args);
?>

<section class="min-h-screen">
    <div class="bg-red min-h-screen w-full py-10 px-4">

        <div class="flex flex-col md:flex-row justify-between text-center md:text-left items-center pb-6">
            <h1 class="text-blue mb-2">I NOSTRI CORSI E WORKSHOP</h1>
            <div class="md:mr-6">
                <!-- CHANGE URL TO GO TO ALL EVENTS PAGE -->
                <?php echo (new Button('VEDI TUTTI', home_url('/workshop')))->type('neutral')->variant('outline')->addClass('')->render(); ?>
            </div>
        </div>

        <div
            class="flex flex-col md:flex-row items-center md:items-stretch overflow-x-auto space-y-6 md:space-y-0 md:space-x-4 snap-x-4 pb-6 scrollbar-hide">
            <?php if ($workshops->have_posts()):
                while ($workshops->have_posts()):
                    $workshops->the_post(); ?>
                    <?php
                    $workshop_date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
                    $workshop_date_to = get_post_meta(get_the_ID(), '_workshop_date_to', true);
                    $workshop_date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true);
                    // $workshop_days = get_post_meta(get_the_ID(), '_workshop_days', true);
                    ?>
                    <div
                        class="card flex flex-col flex-shrink-0 w-11/12 sm:w-4/5 md:w-2/3 lg:w-1/2 h-auto md:mr-10 bg-gray border-8 border-blue rounded-xs snap-start">
                        <div class="flex-shrink-0">
                            <div class="h-64 md:h-90 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                <?php else: ?>
                                    <img src="http://spazio-eo.local/wp-content/uploads/2025/03/eo-arte-outside.webp"
                                        alt="Immagine di default" class="w-full h-full object-cover" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex flex-col flex-grow text-center md:text-left p-6">
                            <h2 class="text-dark-gray"><?php the_title(); ?></h2>
                            <p class="text-red text-lg pb-2">
                                <?php if ($workshop_date_tba == 1): ?>
                                    Da annunciare
                                <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                                    <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                                <?php elseif ($workshop_date_from):
                                    echo esc_html(convert_date_format($workshop_date_from))
                                        ?>
                                <?php endif; ?>
                            </p>
                            <div class="text-dark-gray text-xl pb-2">
                                <!--needs a fix here - atm not making paras  -->
                                <?php echo wpautop(get_the_content()) ?>
                            </div>
                            <div class="mt-auto">
                                <?php echo (new Button('BOOK NOW', get_permalink()))->type('secondary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>

    </div>

</section>