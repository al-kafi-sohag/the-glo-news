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
        $data['category'] = Category::with('subCategories')->where('slug', $category_slug)->activated()->first();
        if($sub_category_slug){
            $data['sub_category']  = SubCategory::with('category')->where('slug', $sub_category_slug)->activated()->first();
        }
        $query=PostCategory::with('post.author', 'category', 'subCategory')
            ->where('category_id', $data['category']->id)
            ->join('posts', 'post_categories.post_id', '=', 'posts.id')
            ->orderByRaw('CASE WHEN posts.`order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('posts.order', 'asc')
            ->orderBy('posts.created_at', 'desc');

        if(isset($data['sub_category'])){
            $query->where('subcategory_id',$data['sub_category']->id);
        }
        $data['news'] = $query->paginate(9);
        return view('frontend.news.multiple',$data);
    }

}
