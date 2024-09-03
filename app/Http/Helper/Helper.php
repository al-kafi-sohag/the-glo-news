<?php

use App\Models\Advertisement;
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
function slug($data)
{
    return Str::slug($data);
}

function get_ads($key, $position = 1)
{
    $ad = Advertisement::where('key', $key)->activated()->first();
    if ($ad) {
        if(!empty($ad->details)){
            $details = json_decode($ad->details, true);
            $img = storage_url($details[$position]['img']);
            $result = "<div class='ads_wrapper'><div class='ads_label'>- Advertisement -</div>";
            $result .= "<a href='{$details[$position]['link']}' target='_blank'>";
            $result .= "<img src='{$img}' alt='advertisement'>";
            $result .= "</a></div>";
            return $result;
        }
        return null;
    }
    return null;
}
