<?php

function primary_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-gray bg-blue hover:bg-blue-hover px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function primary_outline_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-dark-gray hover:text-gray bg-inherit hover:bg-blue border-1 border-blue px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function primary_outline_button_alt($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-blue hover:text-gray bg-inherit hover:bg-blue border-1 border-blue px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function primary_shadow_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-gray bg-blue shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function secondary_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-gray bg-red hover:bg-red-hover px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}

function secondary_outline_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-dark-gray hover:text-gray bg-inherit hover:bg-red border-1 border-red px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}
function secondary_outline_button_alt($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-red hover:text-gray bg-inherit hover:bg-red border-1 border-red px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}


function secondary_shadow_button($text, $url, $additional_classes = '')
{
    return '<a href="' . esc_url($url) . '" class="inline-block font-semibold font-albert text-gray bg-red shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out px-3 rounded-sm' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
}



