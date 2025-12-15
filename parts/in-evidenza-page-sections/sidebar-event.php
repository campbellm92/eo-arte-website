<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="max-h-fit p-4 mt-4 bg-light-gray md:col-span-4 md:col-start-10 md:mt-0 md:mr-4">
    <p class="text-red font-bold">
        <?php get_template_part('template-parts/dates/date-event'); ?>
    </p>
    <div>
        <p class="small-text font-semibold text-blue">
            EO ARTE<br>
            via XX settembre, 112, ASTI.
        </p>
    </div>
    <hr class="text-red mb-4">
    <?php
    // fetch the artist associated with the event
    $artist = get_field('artist');
    if ($artist):
        ?>
        <div>
            <div class="flex flex-col items-center text-center">
                <div class="rounded-full overflow-hidden max-w-48 max-h-48">
                    <?php
                    echo get_the_post_thumbnail(
                        $artist,
                        'medium',
                        ['class' => 'w-full h-full object-cover']
                    );
                    ?>
                </div>
            </div>
            <p class="small-text text-center">
                <?php echo apply_filters('the_content', $artist->post_content); ?>
            </p>
        </div>
    <?php endif; ?>

</div>