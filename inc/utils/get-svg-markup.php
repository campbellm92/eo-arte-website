<?php

function get_svg_markup($file_name)
{
    $svg_path = get_template_directory() . "/assets/images/$file_name.svg";

    if (file_exists($svg_path)) {
        return file_get_contents($svg_path);
    }

    return "<!-- SVG file not found: $file_name -->";

}