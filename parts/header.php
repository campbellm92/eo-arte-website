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
        <nav class="flex justify-between items-center max-w-screen w-full bg-inherit p-4 fixed top-0" id="main-nav">
            <a href="/" class="text-blue font-semibold" id="site-title">spazio eo</a>
            <div class="flex items-center space-x-4">
                <ul class="hidden sm:flex space-x-4">
                    <?php
                    $pages = array("/", "/about", "/eventi", "/workshop", "/contattateci");
                    $page_names = array("home", "about", "eventi", "workshop", "contattateci");
                    $style =
                        "text-gray font-semibold bg-blue px-3 rounded-xs hover:text-blue hover:bg-gray hover:outline hover:outline-blue transition duration-600 ease-in-out";
                    foreach ($page_names as $index => $page_name) {
                        $href = $pages[$index];
                        echo "<li class='nav-links $style'><a href=$href >$page_name</a></li>";
                    }
                    // extra classes or ids here required for scripting for dynamic styling
                    // see also input.css
                    ?>
                </ul>
                <!-- menu toggle icon -->
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-eo-o-blue.webp"
                    alt="Spazio EO logo blue" class="sm:hidden w-7 cursor-pointer" id="toggle-icon">
            </div>
            <!-- mobile menu -->
            <div class="absolute top-full left-0 w-full bg-gray p-6 z-50 hidden" id="mobile-menu">
                <ul class="flex flex-col space-y-4">
                    <?php
                    foreach ($page_names as $index => $page_name) {
                        $href = $pages[$index];

                        $current_page = $_SERVER['REQUEST_URI'];

                        $is_current = ($current_page == $href) ||
                            ($href == '/' && $current_page == '/') ||
                            ($href != '/' && strpos($current_page, $href) === 0);

                        // Add active class if this is the current page
                        $active_class = $is_current ? 'text-red font-bold' : 'text-blue hover:text-red';

                        echo "<li class='mobile-menu-nav-links'><a href='$href' class='$active_class font-medium text-xl'>$page_name</a></li>";
                    } ?>
                </ul>
            </div>

        </nav>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const mainNav = document.getElementById("main-nav");
            const siteTitle = document.getElementById("site-title");
            const navLinks = document.querySelectorAll(".nav-links");
            const toggleIcon = document.getElementById("toggle-icon");
            const mobileMenu = document.getElementById("mobile-menu");
            const mobileNavLinks = document.querySelectorAll(".mobile-menu-nav-links");
            const srcForBlueIcon = "<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-eo-o-blue.webp";
            const srcForWhiteIcon = "<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-eo-o-white.webp";

            <?php if (is_front_page()): ?>
                const heroSection = document.getElementById("hero-section");
                function changeNavColorOnScroll() {
                    if (window.scrollY > heroSection.offsetHeight / 1.1) {
                        mainNav.classList.add("main-nav-scrolled");
                        siteTitle.classList.add("site-title-scrolled");
                        navLinks.forEach((link) => link.classList.add("links-default"));
                        toggleIcon.src = srcForWhiteIcon;

                    } else {
                        mainNav.classList.remove("main-nav-scrolled");
                        siteTitle.classList.remove("site-title-scrolled");
                        navLinks.forEach((link) => link.classList.remove("links-default"));
                        toggleIcon.src = srcForBlueIcon;
                    }
                }
                changeNavColorOnScroll();
                window.addEventListener("scroll", changeNavColorOnScroll);
            <?php endif; ?>

            function changeNavOnWindowResize() {
                const windowIsSmall = window.innerWidth < 750;

                if (windowIsSmall) {
                    navLinks.forEach((link) => {
                        link.style.display = "none";
                    });
                    mobileNavLinks.forEach((link) => {
                        link.style.display = "block";
                    });
                    toggleIcon.style.display = "block"
                } else {
                    navLinks.forEach((link) => {
                        link.style.display = "block";
                    });
                    mobileNavLinks.forEach((link) => {
                        link.style.display = "none";
                    });
                    toggleIcon.style.display = "none"
                }
            }
            changeNavOnWindowResize();
            window.addEventListener("resize", changeNavOnWindowResize);

            function toggleNavMenu() {
                const mobileMenu = document.getElementById("mobile-menu");
                if (mobileMenu.classList.contains("hidden")) {
                    mobileMenu.classList.remove("hidden");
                } else {
                    mobileMenu.classList.add("hidden");
                }
            }
            toggleIcon.addEventListener("click", toggleNavMenu);
        });
    </script>