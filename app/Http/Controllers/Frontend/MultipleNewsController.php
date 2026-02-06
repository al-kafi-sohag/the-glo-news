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
        $query = Category::activated()->where('slug', $category_slug);
        $category = $query->firstOrFail();

        $postsQuery = Post::with(['author', 'categories.category', 'categories.subCategory'])
            ->activated()
            ->whereHas('categories', function ($q) use ($category, $sub_category_slug) {
                if ($sub_category_slug) {
                    $q->where('sub_category_slug', $sub_category_slug);
                } else {
                    $q->where('category_id', $category->id);
                }
            })
            ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Breadcrumbs
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('f.home')],
            ['name' => $category->name, 'url' => route('f.category.index', $category->slug)],
        ];
        if ($sub_category_slug) {
            $sub = $category->subCategories->where('slug', $sub_category_slug)->first();
            $breadcrumbs[] = ['name' => $sub?->name ?? 'Subcategory', 'url' => route('f.category.index', [$category->slug, $sub_category_slug])];
        }

        $title = $sub_category_slug ? ($sub?->name ?? $category->name) : $category->name;

        $this->setupSEO(
            "$title - The Reporter 24",
            "Latest news and updates from $title on The Reporter 24.",
            null,
            null,
            'website',
            'CollectionPage',
            $breadcrumbs
        );

        $data = [
            'posts' => $postsQuery,
            'category' => $category,
            'sub_category_slug' => $sub_category_slug,
            'title' => $title,
        ];
        return view('frontend.news.multiple',$data);
    }

}
