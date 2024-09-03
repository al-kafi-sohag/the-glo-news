<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SingleNewsPageController extends Category
{
    public function index($slug): View|RedirectResponse
    {
        $data['news'] = Post::with(['categories', 'categories.category', 'categories.subCategory'])->where('slug', $slug)->activated()->latest()->first();
        if(empty($data['news'])){
            sweetalert()->warning('News not found');
            return redirect()->back();
        }
        $data['category'] = Category::with(['subCategories'])->activated()->latest()->get();

        $categoryIds = $data['news']->categories->pluck('id');

        $data['related_news'] = Post::with(['categories', 'categories.category', 'categories.subCategory'])
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })->where('id', '!=', $data['news']->id)->activated()->latest()->get();


        $data['news']->increment('visitors', 10);

        return view('frontend.news.single', $data);
    }
}
