<?php

function primary_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block px-3 text-gray bg-blue font-semibold font-albert rounded-md ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

