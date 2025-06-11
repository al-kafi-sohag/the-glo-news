<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index() :View
    {
        $data['main_news'] = Post::where('is_main', 1)->activated()->latest()->first();
        $data['featured_news'] = Post::where('is_featured', 1)->activated()
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(10)->get();

        $data['trending_news'] = Post::where('is_trending', 1)->activated()
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(10)->get();

        $data['categories'] = Category::activated()->latest()->get();
        $data['featured_categories'] = Category::withCount('posts')->where('is_featured', 1)->activated()->latest()->limit(10)->get();

        return view('frontend.home.index', $data);
    }

    public function tc() :View
    {
        return view('frontend.home.tc');
    }

    public function disclaimer(): View
    {
        $data['last_update_date'] = Carbon::createFromFormat('m,d,Y', '06-11-2025')->format('F d, Y');
        return view('frontend.home.disclaimer', $data);
    }
}
