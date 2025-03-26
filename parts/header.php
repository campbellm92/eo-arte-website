<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
</head>


<!-- script for changing navbar color on scroll in assets/js/change-nav-color.js -->

<body>
    <header>
        <!-- main nav -->
        <nav class="flex justify-between items-center w-full bg-gray p-4 fixed top-0" id="main-nav">
            <a href="/" class="text-blue font-semibold" id="site-title">spazio eo</a>
            <div class="flex items-center space-x-4">
                <ul class="hidden sm:flex space-x-4">
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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-eo-o-blue.webp"
                    alt="Spazio EO logo" class="sm:hidden w-7" id="toggle-icon">
            </div>
            <div class="absolute top-full left-0 w-full bg-gray p-6 z-50 " id="mobile-menu">
                <ul class="flex flex-col space-y-4">
                    <?php
                    foreach ($page_names as $index => $page_name) {
                        $href = $pages[$index];
                        echo "<li><a href='$href' class='text-blue font-medium text-xl'>$page_name</a></li>";
                    } ?>
                </ul>
            </div>

        </nav>
    </header>