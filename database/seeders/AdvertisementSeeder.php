<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    public function run()
    {

        Advertisement::create([
            'title' => 'Header Advertisement',
            'key' => 'header',
            'details' => json_encode([
                1 => [
                    "img" => "images/ads/1/728x90ads.jpg",
                    "link" => config('app.url'),
                    "name" => "Header Advertisement Image",
                    "width" => 728,
                    "height" => 90,
                    "aspect_ratio" => "8:1"
                ]
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Homepage Advertisement',
            'key' => 'homepage',
            'details' => json_encode([
                1 => [
                    "img" => "images/ads/1/728x90ads.jpg",
                    "link" => config('app.url'),
                    "name" => "Homepage Advertisement Image",
                    "width" => 300,
                    "height" => 300,
                    "aspect_ratio" => "1:1"
                ]
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Multiple News Page Advertisement',
            'key' => 'multiple_news_page',
            'details' => json_encode([
                1 => [
                    "img" => "images/ads/1/728x90ads.jpg",
                    "link" => config('app.url'),
                    "name" => "Multiple News Page Advertisement Image",
                    "width" => 728,
                    "height" => 90,
                    "aspect_ratio" => "8:1"
                ]
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Author News Page Advertisement',
            'key' => 'author_news_page',
            'details' => json_encode([
                1 => [
                    "img" => "images/ads/1/728x90ads.jpg",
                    "link" => config('app.url'),
                    "name" => "Author News Page Advertisement Image",
                    "width" => 728,
                    "height" => 90,
                    "aspect_ratio" => "8:1"
                ]
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Single News Page Advertisement',
            'key' => 'single_news_page',
            'details' => json_encode([
                1 => [
                    "img" => "images/ads/1/728x90ads.jpg",
                    "link" => config('app.url'),
                    "name" => "Single News Page Advertisement Image",
                    "width" => 300,
                    "height" => 300,
                    "aspect_ratio" => "1:1"
                ]
            ]),
            'status' => 1,
        ]);
    }
}
