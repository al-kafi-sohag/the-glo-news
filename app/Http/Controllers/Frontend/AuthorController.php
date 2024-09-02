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
        $data['advertisement'] = Advertisement::where('key','author_news_page')->activated()->first();
        $data['author'] = Author::findOrFail($author_id);
        $data['news'] = Post::with(['categories','subCategories','author'])->activated()->where('author_id',$author_id)->latest()->get();
        return view('frontend.news.author_news',$data);
    }
}
