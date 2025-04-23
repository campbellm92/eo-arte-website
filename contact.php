<?php
/* Template Name: Contact Page */

if (!defined('ABSPATH'))
    exit;




?>

<?php get_template_part('parts/header'); ?>


<main>
    <section class="min-h-screen bg-gray mt-10">
        <div class="flex justify-center items-center w-full h-screen">
            <form action="inc/contact-form-logic.php" method="post" class="flex flex-col p-4 bg-blue rounded-xs">

                <p class="text-gray font-semibold mb-2">Send us a message</p>

                <label for="name" class="mb-1 text-gray">Nome</label>
                <input type="text" name="name" id="name" placeholder="Inserisci il tuo nome"
                    class="border border-gray text-gray rounded-xs p-1 mb-3 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray"
                    required>

                <label for="email" class="mb-1 text-gray">Email</label>
                <input type="email" name="email" id="email" placeholder="Inserisci il tuo email"
                    class="border border-gray text-gray rounded-xs p-1 mb-3 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray"
                    required>

                <label for="message" class="mb-1 text-gray">Il tuo messagio</label>
                <textarea name="message" id="message" placeholder="Scrivi qualcosa"
                    class="border border-gray text-gray rounded-xs p-1 mb-3 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray"
                    required></textarea>

                <button type="submit"
                    class="inline-block font-extrabold px-3 rounded-xs text-center text-dark-gray bg-gray hover:bg-gray-hover transition-hover duration-500 ease-in-out cursor-pointer">SEND</button>
            </form>
        </div>

    </section>

</main>




<?php get_template_part('parts/footer'); ?>