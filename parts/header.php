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
    </header>