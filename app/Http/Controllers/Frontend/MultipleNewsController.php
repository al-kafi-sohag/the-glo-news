<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\Request;

class MultipleNewsController extends Controller
{
    public function index($category_id, $sub_category_id = false): View
    {
        $data['category'] = Category::findOrFail($category_id);
        $query = PostCategory::with(['category','subCategory','post.author'])->where('category_id',$category_id);
        if($sub_category_id){
            $query->where('subcategory_id',$sub_category_id);
        }
        $data['news'] = $query->get();
        $data['category'] = Category::findOrFail($category_id);
        return view('frontend.news.multiple',$data);
    }
}
