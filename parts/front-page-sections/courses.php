<!-- courses section -->
<section class="min-h-screen">
    <div class="bg-red min-h-screen m-10 p-4">
        <h1 class="text-blue">CORSI</h1>

        <div class="cards-container grid grid-cols-1 xl:grid-cols-3 lg:grid-cols-2 gap-4 pb-6">
            <div class="card bg-gray max-w-xl border-8 border-blue rounded-xs">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eo-arte-outside.webp" alt=""
                    class="featured-img px-6 pt-6">
                <div class="card-content p-6">
                    <h2 class="event-title">Course name</h2>
                    <p class="card-time-date text-red pb-2">Course dates</p>
                    <p class="description">Scream for no reason at 4 am you call this cat food claws in the eye of
                        the
                        beholder eat owner's food yet stares at human while pushing stuff off a table, i vomit in
                        the
                        bed in the middle of the night.</p>
                    <div class="btn-container">
                        <?php echo (new Button('BOOK NOW', ''))->type('primary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                    </div>
                </div>
            </div>

            <div class="card bg-gray max-w-xl border-8 border-blue rounded-xs">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eo-arte-outside.webp" alt=""
                    class="featured-img px-6 pt-6">
                <div class="card-content p-6">
                    <h2 class="event-title">Event name</h2>
                    <p class="card-time-date text-red pb-2">Event time and date</p>
                    <p class="description">Scream for no reason at 4 am you call this cat food claws in the eye of
                        the
                        beholder eat owner's food yet stares at human while pushing stuff off a table, i vomit in
                        the
                        bed in the middle of the night.</p>
                    <div class="btn-container">
                        <?php echo (new Button('BOOK NOW', ''))->type('primary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                    </div>
                </div>
            </div>

            <div class="card bg-gray max-w-xl border-8 border-blue rounded-xs">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eo-arte-outside.webp" alt=""
                    class="featured-img px-6 pt-6">
                <div class="card-content p-6">
                    <h2 class="event-title">Event name</h2>
                    <p class="card-time-date text-blue pb-2">Event time and date</p>
                    <p class="description">Scream for no reason at 4 am you call this cat food claws in the eye of
                        the
                        beholder eat owner's food yet stares at human while pushing stuff off a table, i vomit in
                        the
                        bed in the middle of the night.</p>
                    <div class="btn-container">
                        <?php echo (new Button('BOOK NOW', ''))->type('primary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>