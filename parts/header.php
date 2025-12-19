<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
</head>


<body>

    <?php if (is_front_page()): ?>
        <div id="loading-screen">
            <video id="loading-video" autoplay muted playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/dream.mp4" type="video/mp4">
            </video>
        </div>
    <?php endif; ?>

    <header>
        <!-- main nav -->
        <nav class="flex justify-between items-center max-w-screen w-full bg-gray/45 p-4 fixed top-0 z-50"
            id="main-nav">
            <a href="/" class="p-3" id="site-title"><img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-eo-arte.svg"
                    alt="EO Arte logo" class="w-20"></a>
            <div class="flex items-center space-x-4">
                <!-- menu toggle icon -->
                <button class="w-7 cursor-pointer text-5xl mx-10 md:mx-20 text-blue" id="toggle-icon">•••</button>
            </div>
            <div class="absolute top-full left-0 w-full p-6 z-50 hidden bg-gray h-screen" id="menu">
                <ul class="flex flex-col space-y-8">
                    <?php
                    $pages = array("/chisiamo", "/in-evidenza", "/colletivo", "/contattaci");
                    $page_names = array("CHI SIAMO", "IN EVIDENZA", "COLLETIVO", "CONTATTACI");
                    $style =
                        "text-3xl px-3 hover:text-red transition duration-600 ease-in-out";
                    foreach ($page_names as $index => $page_name) {
                        $href = $pages[$index];
                        echo "<li class='nav-links $style'><a href=$href >$page_name</a></li>";
                    }
                    ?>

                </ul>
            </div>

        </nav>
    </header>