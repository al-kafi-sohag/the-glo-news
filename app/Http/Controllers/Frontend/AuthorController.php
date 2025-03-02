<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{
    public function news($author_id):View
    {
        $data['author'] = Author::findOrFail($author_id);
        $data['news'] = Post::with(['categories','subCategories','author'])
            ->activated()
            ->where('author_id',$author_id)
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.news.author_news',$data);
    }
}
