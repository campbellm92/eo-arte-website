<?php

$button_base = "inline-block font-semibold font-albert px-3";

function primary_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-blue hover:bg-blue-hover ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function primary_outline_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-blue hover:text-gray bg-inherit hover:bg-blue border-1 border-blue ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function primary_shadow_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-blue shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function secondary_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-red hover:bg-red-hover ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}


function secondary_outline_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-red hover:text-gray bg-inherit hover:bg-red border-1 border-red ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function secondary_shadow_button($text, $url, $additional_classes = '')
{
    global $button_base;
    return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-red shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}



