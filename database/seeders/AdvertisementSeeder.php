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
                'header' => [
                    'image' => 'frontend/img/728x90ads.png',
                    'link' => 'https://theglonews.com',
                ],
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Homepage Advertisement',
            'key' => 'homepage',
            'details' => json_encode([
                'right_side' => [
                    'image' => 'frontend/img/300x250ads.png',
                    'link' => 'https://theglonews.com',
                ],
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Multiple News Page Advertisement',
            'key' => 'multiple_news_page',
            'details' => json_encode([
                'middle_row' => [
                    'image' => 'frontend/img/300x250ads.png',
                    'link' => 'https://theglonews.com',
                ],
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Author News Page Advertisement',
            'key' => 'author_news_page',
            'details' => json_encode([
                'middle_row' => [
                    'image' => 'frontend/img/300x250ads.png',
                    'link' => 'https://theglonews.com',
                ],
            ]),
            'status' => 1,
        ]);

        Advertisement::create([
            'title' => 'Single News Page Advertisement',
            'key' => 'single_news_page',
            'details' => json_encode([
                'right_side_1' => [
                    'image' => 'frontend/img/300x250ads.png',
                    'link' => 'https://theglonews.com',
                ],
                'right_side_2' => [
                    'image' => 'frontend/img/300x250ads.png',
                    'link' => 'https://theglonews.com',
                ],
            ]),
            'status' => 1,
        ]);
    }
}
