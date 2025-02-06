<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Author;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class MultipleNewsController extends Controller
{
    public function index($category_slug, $sub_category_slug = false): View
    {
        $data['category'] = Category::with('subCategories')
            ->where('slug', $category_slug)
            ->activated()
            ->first();

        if ($sub_category_slug) {
            $data['sub_category'] = SubCategory::with('category')
                ->where('slug', $sub_category_slug)
                ->activated()
                ->first();
        }

        $data['news'] = Post::with([
            'author',
            'postCategories.category',
            'postCategories.subCategory'
        ])
        ->activated()
        ->whereHas('postCategories', function ($query) use ($data) {
            $query->where('category_id', $data['category']->id);
            if (isset($data['sub_category'])) {
                $query->where('subcategory_id', $data['sub_category']->id);
            }
        })
        // ->orderBy('order', 'asc')
        ->latest()
        ->paginate(10);


        return view('frontend.news.multiple', $data);

    }

}
