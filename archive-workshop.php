<!-- All workshops page, including present, upcoming and archived -->
<?php
if (!defined('ABSPATH'))
    exit;
?>


<?php
get_template_part('parts/header');
?>

<?php
// custom WP query
$args = [
    'post_type' => 'workshop',
    // 'posts_per_page' => 3,
    // 'meta_key' => '_event_date_time',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$workshops = new WP_Query($args);
?>


<main class="pt-[9rem]">
    <!-- title and buttons -->
    <div class="px-5">
        <div class="text-center md:text-left">
            <h1 class="mb-5">WORKSHOP</h1>
        </div>

        <div class="flex flex-col md:flex-row justify-center md:justify-start gap-2 md:gap-5 mb-10">
            <?php echo (new Button('ATTUALI E PROSSIMI', '#'))->type('neutral')->variant('outline')->addClass('show-upcoming')->render(); ?>
            <?php echo (new Button('ARCHIVIO', '#'))->type('neutral')->variant('outline')->addClass('show-archive')->render(); ?>
        </div>

    </div>


    <!-- Current and upcoming -->
    <section class="min-h-screen px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ($workshops->have_posts()):
                while ($workshops->have_posts()):
                    $workshops->the_post(); ?>
                    <?php
                    $workshop_date_from = get_post_meta(get_the_ID(), '_workshop_date_from', true);
                    $workshop_date_to = get_post_meta(get_the_ID(), '_workshop_date_to', true);
                    $workshop_date_tba = get_post_meta(get_the_ID(), '_workshop_date_tba', true); ?>

                    <div class="cursor-pointer" onclick="location.href='<?php echo get_the_permalink(); ?>'">
                        <!-- Content Container  -->
                        <div class="flex flex-col justify-between h-full gap-4 p-6 border-8 border-light-gray hover:bg-red">
                            <!-- Content -->
                            <h2 class="break-words"><?php the_title(); ?></h2>
                            <p class="text-xl">
                                <?php if ($workshop_date_tba == 1): ?>
                                    Da annunciare
                                <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                                    <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                                <?php elseif ($workshop_date_from):
                                    echo esc_html(convert_date_format($workshop_date_from))
                                        ?>
                                <?php endif; ?>
                            </p>
                            <p class="text-xl text-left line-clamp-3 overflow-hidden">
                                <?php echo get_the_content() ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
    </section>


    <!-- 
    <div class="w-full rounded-xs overflow-hidden bg-gray max-w-xs border-8 border-red">
        <?php if (has_post_thumbnail()): ?>

            <?php the_post_thumbnail('full', ['class' => 'w-[calc(100%-16px)] h-48 object-cover m-2']) ?>

        <?php endif ?>
        <div class="w-full h-max rounded px-3.5 py-2.5">
            <h2 class="font-bold text-dark-gray mb-3"><?php the_title(); ?></h2>
            <p class="small-text text-red mb-3">
                <?php if ($workshop_date_tba == 1): ?>
                    Da annunciare
                <?php elseif ($workshop_date_from && $workshop_date_to): ?>
                    <?php echo esc_html(convert_date_format($workshop_date_from)) . " → " . esc_html(convert_date_format($workshop_date_to)); ?>
                <?php elseif ($workshop_date_from):
                    echo esc_html(convert_date_format($workshop_date_from))
                        ?>
                <?php endif; ?>
            </p>
            <p class="line-clamp-3 overflow-hidden mb-3">
                <?php echo get_the_content() ?>
            </p>

        </div>
        <div class="flex justify-center w-full px-3.5 pt-2 pb-3.5">
            <?php echo (new Button('ENQUIRE', '#'))->type('neutral')->variant('filled')->addClass('w-full')->render(); ?>
        </div>
    </div> -->



</main>

<?php
get_template_part('parts/footer');
?>