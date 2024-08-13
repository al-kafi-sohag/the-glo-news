<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index() :View
    {
        $data['main_news'] = Post::where('is_main', 1)->activated()->latest()->first();
        $data['featured_news'] = Post::where('is_featured', 1)->activated()->latest()->limit(10)->get();
        $data['trending_news'] = Post::where('is_trending', 1)->activated()->latest()->limit(10)->get();
        return view('frontend.home.index', $data);
    }
}
