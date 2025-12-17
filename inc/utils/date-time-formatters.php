<?php

if (!defined('ABSPATH'))
    exit;

function convert_date_format($date_string)
{

    if (!$date_string)
        return '';

    $date = new DateTime($date_string);

    $formatter = new IntlDateFormatter('it_IT', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Rome', IntlDateFormatter::GREGORIAN, "EEEE d MMMM");

    return $formatter->format($date);

}

function convert_time_format($time_string)
{

    if (!$time_string)
        return '';

    $time = new DateTime($time_string);

    $formatter = new IntlDateFormatter(
        'it_IT',
        IntlDateFormatter::NONE,
        IntlDateFormatter::SHORT,
        'Europe/Rome',
        IntlDateFormatter::GREGORIAN,
        "HH:mm"
    );

    return $formatter->format($time);

}

function convert_to_day_and_short_month($date_string)
{

    if (!$date_string)
        return '';

    $date = new DateTime($date_string);

    $formatter = new IntlDateFormatter('it_IT', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Rome', IntlDateFormatter::GREGORIAN, "dd MMM");

    return $formatter->format($date);

}