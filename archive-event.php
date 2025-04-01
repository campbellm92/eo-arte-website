<?php
if (!defined('ABSPATH'))
    exit;
?>


<?php
get_template_part('parts/header');
?>

<main class="bg-blue pt-[5rem] px-10">


    <h1 class="text-gray mb-10">EVENTI</h1>

    <div class="mb-10">
        <?php echo (new Button('ATTUALI E PROSSIMI', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-present-events')->render(); ?>
        <?php echo (new Button('ARCHIVIO', '#'))->type('neutral')->variant('outline')->addClass('event-toggle-btn show-past-events')->render(); ?>
    </div>

    <!-- Current and upcoming -->
    <section class="min-h-screen">
        <div class="flex flex-col md:flex-row text-gray hover:bg-red cursor-pointer">
            <img src="https://placehold.co/300x200" alt="" class="rounded-xs">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-center flex-1 mb-6">
                <h2 class="px-4 line-clamp-2 mt-6">This is a loooooong event name
                </h2>
                <p class="sm:px-10">11.04.2025, 15:30</p>
                <p class="sm:px-10 line-clamp-2">Excerpt of the description of the event</p>
            </div>

        </div>

    </section>



</main>



<?php
get_template_part('parts/footer');
?>