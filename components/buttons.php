<?php

class Button
{
    private $button_base = "inline-block font-extrabold font-albert px-3 rounded-xs text-center";
    private $text;
    private $url;
    private $type = 'primary';
    private $variant = 'solid';
    private $additional_classes = '';

    public function __construct($text, $url)
    {
        $this->text = $text;
        $this->url = $url;
    }

    public function type($type)
    {
        // primary, secondary
        $this->type = $type;
        return $this;
    }

    public function variant($variant)
    {
        $this->variant = $variant;
        return $this;
    }

    public function addClass($classes)
    {
        $this->additional_classes = $classes;
        return $this;
    }

    public function render()
    {
        $styles = [
            // note: btn classname used for clamp styles (easier in pure css)
            // consider creating a width btn instead of using additional classes
            'primary-solid' => 'btn text-gray font-semibold bg-blue hover:bg-blue-hover transition-hover duration-500 ease-in-out',
            'primary-outline' => 'btn text-blue hover:text-gray bg-inherit hover:bg-blue border-8 border-blue transition-hover duration-500 ease-in-out',
            'secondary-solid' => 'btn text-gray bg-red hover:bg-red-hover transition-hover duration-500 ease-in-out',
            'secondary-outline' => 'btn text-red hover:text-gray bg-inherit hover:bg-red border-8 border-red transition-hover duration-500 ease-in-out',
            'neutral-solid' => 'btn text-dark-gray font-semibold bg-gray hover:bg-gray-hover transition-hover duration-500 ease-in-out',
            'neutral-outline' => 'btn text-gray hover:text-dark-gray bg-inherit hover:bg-gray border-8 border-gray transition-hover duration-500 ease-in-out',

        ];

        $key = $this->type . '-' . $this->variant;
        $style_classes = isset($styles[$key]) ? $styles[$key] : $styles['primary-solid'];

        return '<a href="' . esc_url($this->url) . '" class="' . $this->button_base . ' ' .
            $style_classes . ' ' . esc_attr($this->additional_classes) . '">' .
            esc_html($this->text) . '</a>';
    }
}









// function primary_button($text, $url, $additional_classes = '')
// {
//     global $button_base;
//     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-blue hover:bg-blue-hover ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// }

// function primary_outline_button($text, $url, $additional_classes = '')
// {
//     global $button_base;
//     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-blue hover:text-gray bg-inherit hover:bg-blue border-1 border-blue ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// }

// // function primary_shadow_button($text, $url, $additional_classes = '')
// // {
// //     global $button_base;
// //     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-blue shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// // }

// function secondary_button($text, $url, $additional_classes = '')
// {
//     global $button_base;
//     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-red hover:bg-red-hover ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// }


// function secondary_outline_button($text, $url, $additional_classes = '')
// {
//     global $button_base;
//     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-red hover:text-gray bg-inherit hover:bg-red border-1 border-red ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// }

// // function secondary_shadow_button($text, $url, $additional_classes = '')
// // {
// //     global $button_base;
// //     return '<a href="' . esc_url($url) . '" class=" ' . $button_base . ' text-gray bg-red shadow-md hover:shadow-none transition-shadow duration-500 ease-in-out ' . esc_attr($additional_classes) . '">' . esc_html($text) . '</a>';
// // }



