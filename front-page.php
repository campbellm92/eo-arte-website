<?php
get_template_part('parts/header');
?>

<main>

    <!-- section with EO icon (hero) -->
    <section class="bg-blue min-h-screen flex justify-center items-center" id="hero-section">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-eo.webp" alt="Spazio EO logo"
            class="p-6">
    </section>

    <!-- about section -->
    <section
        class="min-h-screen bg-[url(/wp-content/themes/eo-main/assets/images/eo-arte-outside.webp)] bg-no-repeat bg-center bg-cover lg:bg-fixed flex flex-col justify-center">
        <!-- get_template_directory_uri not working here..? -->
        <div class="w-5/6 max-w-3xl bg-gray m-10 p-4 rounded-xs">
            <h1 class="text-red">ABOUT</h1>
            <p class="text-red font-semibold ">It's 3am, time to create some chaos
                commence
                midnight zoomies yet
                i
                is not fat, i is fluffy waffles terrorize
                the hundred-and-twenty-pound rottweiler and steal his bed, not sorry. Claws in the eye of the beholder
                go
                crazy with excitement when plates are clanked together signalling the arrival of cat food my water bowl
                is
                clean and freshly replenished, so i'll drink from the toilet for the dog smells bad so sun bathe, so
                intrigued by the shower.</p>
        </div>
    </section>

    <!-- events section -->
    <section class="min-h-screen">
        <div class="bg-blue min-h-screen m-10 p-4 rounded-xs">
            <h1 class="text-red pb-6">EVENTI</h1>

            <div class="cards-container grid-cols-3 gap-4 pb-6">
                <div class="card bg-gray max-w-lg border-4 border-red">
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
                            <?php echo (new Button('SCOPRI DI PIÙ', ''))->type('secondary')->variant('outline')->addClass('mt-4 w-full text-center')->render(); ?>
                        </div>
                    </div>



                </div>
            </div>


        </div>

    </section>

    <!-- photo bg section -->
    <section
        class="min-h-screen bg-[url(/wp-content/themes/eo-main/assets/images/eo-workshop.webp)] bg-no-repeat bg-center bg-cover lg:bg-fixed flex flex-col justify-center">
    </section>

    </section>

    <!-- courses section -->
    <section class="min-h-screen">
        <div class="bg-red min-h-screen m-10 p-4">
            <h1 class="text-blue">CORSI</h1>
        </div>

    </section>



</main>

<?php
get_template_part('parts/footer');
?>