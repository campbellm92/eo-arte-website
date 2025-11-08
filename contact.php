<?php
/* Template Name: Contact Page */

if (!defined('ABSPATH'))
    exit;

?>

<?php get_template_part('parts/header'); ?>


<main>
    <section class="min-h-screen mt-10 flex flex-col justify-center">
        <div class="flex justify-center items-center w-full h-screen">
            <form action="/wp-admin/admin-post.php" method="POST" id="contactForm"
                class="flex flex-col p-4 w-sm h-max rounded-xs border-2">
                <input type="hidden" name="action" value="submit_contact_form">

                <p class="font-semibold mb-2">Send us a message</p>

                <label for="name" class="mb-1">Nome</label>
                <input type="text" name="name" id="name" placeholder="Inserisci il tuo nome" value=""
                    class="border rounded-xs p-1 mb-4 focus:outline-2 focus:outline-red focus:border-red">
                <div id="nameError" style="display: none" class="text-red text-sm mb-2 py-2">Inserisci il tuo nome</div>

                <label for="email" class="mb-1">Email</label>
                <input type="email" name="email" id="email" placeholder="Inserisci il tuo email" value=""
                    class="border rounded-xs p-1 mb-4 focus:outline-2 focus:outline-red focus:border-red">
                <div id="emailError" style="display: none" class="text-red text-sm mb-2 py-2"></div>

                <label for="message" class="mb-1">Il tuo messaggio</label>
                <textarea name="message" id="message" placeholder="Scrivi qualcosa"
                    class="border rounded-xs p-1 mb-4 focus:outline-2 focus:outline-red focus:border-red"></textarea>
                <div id="messageError" style="display: none" class="text-red text-sm mb-2 py-2"></div>

                <button type="submit" id="submitBtn"
                    class="inline-flex items-center justify-center font-extrabold px-3 w-1/2 self-center rounded-xs text-center text-dark-gray bg-gray hover:bg-gray-hover transition-hover duration-500 ease-in-out cursor-pointer">
                    <span id="submitText">SEND</span>
                    <span id="loader" style="display: none"></span>
                </button>

                <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                    <div id="successMessage" style="display: none" class="text-gray text-sm my-2 text-center pt-2">
                        Il tuo messaggio è stato inviato con successo!
                    </div>
                <?php elseif (isset($_GET['success']) && $_GET['success'] === 'false'): ?>
                    <div class="text-red text-sm my-2">
                        Qualcosa è andato storto. Compila tutti i campi prima di inviare.
                    </div>
                <?php endif; ?>
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
    const successMessage = document.getElementById("successMessage");
    const submitBtn = document.getElementById("submitBtn");
    const submitText = document.getElementById("submitText");
    const loader = document.getElementById("loader");


    if (successMessage) {
        successMessage.style.display = "block";
        setTimeout(() => {
            successMessage.style.display = "none"
        }, 5000)
    }


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
            successMessage.style.display = "none";
        }

        if (emailInput.value.trim() === "") {
            emailError.style.display = "block";
            emailError.innerText = "Inserisci la tua e-mail";
            hasErrors = true;
            successMessage.style.display = "none";
        } else if (!isValidEmail(emailInput.value.trim())) {
            emailError.style.display = "block";
            emailError.innerText = "L'e-mail inserita non è valida";
            hasErrors = true;
            successMessage.style.display = "none";
        };

        if (messageInput.value.trim() === "") {
            messageError.style.display = "block";
            messageError.innerText = "Non hai scritto qualcosa!";
            hasErrors = true;
            successMessage.style.display = "none";
        };

        if (!hasErrors) {
            loader.style.display = "block";
            submitBtn.disabled = true;
            submitText.style.display = "none";
            // contactForm.submit();
        };
    })
</script>


<?php get_template_part('parts/footer'); ?>