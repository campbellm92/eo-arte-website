<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="col-span-8 md:mr-12">
    <h2 class="pb-4">
        <?php the_title(); ?>
    </h2>
    <div class="pr-4">
        <?php the_content(); ?>
    </div>
</div>