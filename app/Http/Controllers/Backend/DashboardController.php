<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $data['users'] = User::get();
        $data['authors'] =  Author::get();
        $data['categories'] = Category::get();
        $data['subCategories'] = SubCategory::get();
        $data['topCategories'] = PostCategory::select(
            'category_id',
            'categories.title as name',
            DB::raw('count(post_id) as total_news')
        )
        ->join('categories', 'post_categories.category_id', '=', 'categories.id')
        ->groupBy(['category_id', 'categories.title'])
        ->orderBy('total_news', 'desc')
        ->take(5)
        ->get();
        $data['topNews'] =  Post::select('title', 'visitors')->orderBy('visitors', 'desc')->limit(10)->get();

        $year = Carbon::now()->year;
        $monthlyPosts = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as post_count')
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('post_count', 'month')
            ->all();

        $months = [];
        $postCounts = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('F');
            $postCounts[] = $monthlyPosts[$i] ?? 0;
        }

        $data['months'] = $months;
        $data['postCounts'] = $postCounts;

        return view('backend.dashboard.index', $data);
    }

}
