<?php
/* Template Name: Contact Page */

if (!defined('ABSPATH'))
    exit;

?>

<?php get_template_part('parts/header'); ?>


<main>
    <section class="min-h-screen bg-gray mt-10">
        <div class="flex justify-center items-center w-full h-screen">
            <form action="/wp-admin/admin-post.php" method="POST" id="contactForm"
                class="flex flex-col p-4 bg-blue rounded-xs">
                <input type="hidden" name="action" value="submit_contact_form">

                <p class="text-gray font-semibold mb-2">Send us a message</p>

                <label for="name" class="mb-1 text-gray">Nome</label>
                <input type="text" name="name" id="name" placeholder="Inserisci il tuo nome" value=""
                    class="border border-gray text-gray rounded-xs p-1 mb-2 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray">
                <div id="nameError" style="display: none" class="text-xs text-red mb-2">Inserisci il tuo nome</div>

                <label for="email" class="mb-1 text-gray">Email</label>
                <input type="email" name="email" id="email" placeholder="Inserisci il tuo email" value=""
                    class="border border-gray text-gray rounded-xs p-1 mb-2 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray">
                <div id="emailError" style="display: none" class="text-xs text-red mb-2"></div>

                <label for="message" class="mb-1 text-gray">Il tuo messaggio</label>
                <textarea name="message" id="message" placeholder="Scrivi qualcosa"
                    class="border border-gray text-gray rounded-xs p-1 mb-2 focus:outline-2 focus:outline-red focus:border-red placeholder:text-light-gray"></textarea>
                <div id="messageError" style="display: none" class="text-xs text-red mb-2"></div>

                <button type="submit"
                    class="inline-block font-extrabold px-3 rounded-xs text-center text-dark-gray bg-gray hover:bg-gray-hover transition-hover duration-500 ease-in-out cursor-pointer">SEND</button>
                <div id="successMessage" style="display: none" class="text-xs text-gray mb-2"></div>
            </form>
        </div>
    </section>
</main>


<script>
    const contactForm = document.getElementById("contactForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const messageInput = document.getElementById("message");
    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const messageError = document.getElementById("messageError");
    // const successMessage = document.getElementById("successMessage")


    function isValidEmail(email) {
        const emailRegexPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegexPattern.test(email);
    }

    function resetErrorOnInput(inputElement, errorElement) {
        inputElement.addEventListener("input", function () {
            if (inputElement.value.trim() !== "") {
                errorElement.style.display = "none";
            }
        })
    }

    resetErrorOnInput(nameInput, nameError);
    resetErrorOnInput(emailInput, emailError);
    resetErrorOnInput(messageInput, messageError);

    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();



        let hasErrors = false;

        if (nameInput.value.trim() === "") {
            nameError.style.display = "block";
            hasErrors = true;
        }

        if (emailInput.value.trim() === "") {
            emailError.style.display = "block";
            emailError.innerText = "Inserisci la tua e-mail";
            hasErrors = true;
        } else if (!isValidEmail(emailInput.value.trim())) {
            emailError.style.display = "block";
            emailError.innerText = "L'e-mail inserita non è valida"
            hasErrors = true;
        };

        if (messageInput.value.trim() === "") {
            messageError.style.display = "block";
            messageError.innerText = "Non hai scritto qualcosa!"
            hasErrors = true;
        };

        if (!hasErrors) {
            // successMessage.style.display = "block";
            // successMessage.innerText = "Il messaggio è stato inviato";
            contactForm.submit();
        }
    })
</script>


<?php get_template_part('parts/footer'); ?>