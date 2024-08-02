<?php


function storage_url($url)
{
    $default_image = asset('backend/default/no-image.png');
    return $url ? asset('storage/' . $url) : $default_image;
}

function timeFormate($time)
{
    $dateFormat = env('DATE_FORMAT', 'd-M-Y');
    $timeFormat = env('TIME_FORMAT', 'h:i A');
    return date($dateFormat . " " . $timeFormat, strtotime($time));
}
