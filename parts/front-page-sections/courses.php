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

        <div class="flex flex-row justify-between items-center pb-6">
            <h1 class="text-blue">I NOSTRI CORSI E WORKSHOP</h1>
            <div class="mr-6">
                <!-- CHANGE URL TO GO TO ALL EVENTS PAGE -->
                <?php echo (new Button('TUTTI', get_permalink()))->type('neutral')->variant('outline')->addClass('')->render(); ?>
            </div>
        </div>

        <div class="cards-container flex overflow-x-auto space-x-4 snap-x pb-6 scrollbar-hide">
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
                        class="card flex flex-col flex-shrink-0 w-11/12 sm:w-4/5 md:w-2/3 lg:w-1/2 h-auto bg-gray border-8 border-blue rounded-xs snap-start">
                        <div class="flex-shrink-0">
                            <div class="h-64 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                <?php else: ?>
                                    <img src="http://spazio-eo.local/wp-content/uploads/2025/03/eo-arte-outside.webp"
                                        alt="Immagine di default" class="w-full h-full object-cover" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-content flex flex-col flex-grow p-6">
                            <h2 class="card-workshop-title text-blue"><?php the_title(); ?></h2>
                            <p class="card-time-date text-red pb-2">
                                <?php if ($workshop_date_tba == 1): ?>
                                    Da annunciare
                                <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                                    <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                                <?php elseif ($workshop_date_from):
                                    echo esc_html(convert_date_format($workshop_date_from))
                                        ?>
                                <?php endif; ?>
                            </p>
                            <p class="card-workshop-description text-blue">
                                <!--needs a fix here - atm not making paras  -->
                                <?php echo wpautop(get_the_content()) ?>
                            </p>
                            <div class="mt-auto">
                                <?php echo (new Button('BOOK NOW', get_permalink()))->type('secondary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>

    </div>

</section>