<?php
if (!defined('ABSPATH')) {
    exit;
}

$is_event = is_singular('event');
$is_workshop = is_singular('workshop');
$artist = get_field('artist');
?>

<div class="max-h-fit p-4 mt-4 bg-light-gray md:col-span-4 md:col-start-10 md:mt-0 md:mr-4">
    <p class="sidebar-date-time">
        <?php
        if ($is_event) {
            get_template_part('template-parts/dates-times/date-event');
        } elseif ($is_workshop) {
            get_template_part('template-parts/dates-times/date-workshop');
        }
        ?>
    </p>
    <p class="sidebar-date-time">
        <?php
        if ($is_workshop) {
            get_template_part('template-parts/dates-times/days-workshop');
        }
        ?>
    </p>
    <p class="sidebar-date-time">
        <?php
        if ($is_event) {
            get_template_part('template-parts/dates-times/time-event');
        } elseif ($is_workshop) {
            get_template_part('template-parts/dates-times/time-workshop');
        }
        ?>
    </p>
    <div>
        <p class="small-text font-semibold text-blue mt-3">
            EO ARTE<br>
            via XX settembre, 112, ASTI.
        </p>
    </div>
    <hr class="text-red mb-4">
    <?php
    if ($is_event && $artist instanceof WP_Post):
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