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

function get_ads_src($ad, $key)
{
    if (isset($ad->details) && !empty($ad->details)) {
        $details = json_decode($ad->details);
        if (isset($details->{$key}) && !empty($details->{$key})) {
            if (property_exists($details->{$key}, 'image')) {
                return $details->{$key}->image;
            }
        }
    }
    return null;
}

function get_ads_url($ad, $key)
{
    if (isset($ad->details) && !empty($ad->details)) {
        $details = json_decode($ad->details);
        if (isset($details->{$key}) && !empty($details->{$key})) {
            if (property_exists($details->{$key}, 'link')) {
                return $details->{$key}->link;
            }
        }
    }
    return null;
}

function slug($data)
{
    return Str::slug($data);
}
