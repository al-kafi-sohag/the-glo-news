<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function news($author_id): View
    {
        $author = Author::findOrFail($author_id);

        $posts = Post::with(['categories.category', 'categories.subCategory', 'author'])
            ->activated()
            ->where('author_id', $author_id)
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $this->setupSEO(
            "Articles by {$author->name} - The Reporter 24",
            "Read all articles written by {$author->name} on The Reporter 24.",
            null,
            $author->image ? storage_url($author->image) : null,
            'website',
            'ProfilePage',
            [
                ['name' => 'Home', 'url' => route('f.home')],
                ['name' => 'Authors', 'url' => route('f.about.index')],
                ['name' => $author->name, 'url' => route('f.author.news', $author_id)],
            ]
        );

        return view('frontend.news.author_news', compact('author', 'posts'));
    }
}
