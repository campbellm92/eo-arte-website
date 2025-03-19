<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
</head>

<body>
    <header>
        <nav class="flex justify-between items-center w-full bg-gray p-4 fixed top-0" id="main-nav">
            <a href="/" class="text-blue font-semibold" id="site-title">spazio eo</a>
            <ul class="flex justify-end space-x-4">
                <?php
                $pages = array("/", "/about", "/eventi", "/corsi", "/contattateci");
                $page_names = array("home", "about", "eventi", "corsi", "contattateci");
                $style =
                    "text-gray font-semibold bg-blue px-3 rounded-xs hover:text-blue hover:bg-gray hover:outline hover:outline-blue transition duration-600 ease-in-out";
                // look into styles for when page has been clicked and the user is on that page
                foreach ($page_names as $index => $page_name) {
                    $href = $pages[$index];
                    echo "<li class='nav-links $style'><a href=$href >$page_name</a></li>";
                }
                // extra classes or ids here required for scripting for dynamic styling
                // see also input.css
                ?>
            </ul>
        </nav>

        <!-- script for changing navbar color for different sections -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const mainNav = document.getElementById("main-nav");
                const siteTitle = document.getElementById("site-title")
                const navLinks = document.querySelectorAll(".nav-links");
                const heroSection = document.getElementById("hero-section");

                window.addEventListener("scroll", () => {
                    if (window.scrollY > heroSection?.offsetHeight / 1.1) {
                        // the default or 'scrolled' styles
                        mainNav.classList.add("main-nav-scrolled");
                        siteTitle.classList.add("site-title-scrolled")
                        navLinks.forEach(link => link.classList.add("links-default"));
                    } else {
                        // the styles at the hero section
                        mainNav.classList.remove("main-nav-scrolled");
                        siteTitle.classList.remove("site-title-scrolled")
                        navLinks.forEach(link => link.classList.remove("links-default"));
                    }
                })
            })
        </script>

    </header>