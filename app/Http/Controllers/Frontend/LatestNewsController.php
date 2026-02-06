<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{

    public function index($type='all')
    {
        $post_per_page = 10;

        $query = Post::with('author:id,name')->activated()
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc');

        if ($type === 'latest') {
            $query->latest();
        } elseif ($type === 'trending') {
            $query->trending()->latest();
        } elseif ($type === 'popular') {
            $query->popular()->latest();
        } else {
            $query->latest();
        }

        $news = $query->take($post_per_page)
            ->get(['id', 'title', 'slug', 'image', 'post_date', 'created_at', 'author_id'])
            ->each(function ($item) {
                $item->url = route('f.news', $item->slug);
                $item->image = storage_url($item->image);
                $item->cropped_title = strLimit($item->title);
                $item->author->name = strLimit($item->author->name, 25, '...');
                $item->creation_date = newsTimeFormate($item->post_date);
            });

        return response()->json(['news' => $news], 200);
    }
}
