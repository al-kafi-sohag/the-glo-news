<?php
use Illuminate\Support\Str;
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

function strLimit($data, $limit = 50, $end = '...')
{
    return Str::limit($data, $limit, $end);
}

function newsTimeFormate($time)
{
    $dateFormat = env('DATE_FORMAT', 'M d, Y');
    return date($dateFormat, strtotime($time));
}
