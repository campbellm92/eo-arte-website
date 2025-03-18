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
    <header class="bg-gray">
        <nav class="flex justify-between items-center w-full p-4">
            <a href="/" class="text-blue font-semibold">spazio eo</a>
            <ul class="flex justify-end space-x-4">
                <?php
                $pages = array("/", "/about", "/eventi", "/corsi", "/contattateci");
                $page_names = array("home", "about", "eventi", "corsi", "contattateci");
                $style = "text-gray font-semibold bg-blue px-3 rounded-sm";
                foreach ($page_names as $index => $page_name) {
                    $href = $pages[$index];
                    echo "<li class='$style'><a href=$href>$page_name</a></li>";
                }
                ?>
            </ul>
        </nav>


    </header>