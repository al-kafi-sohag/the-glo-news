<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Artesaos\SEOTools\Facades\JsonLd;

class SingleNewsPageController extends Category
{
    public function index($slug): View|RedirectResponse
    {
        $news = Post::with(['categories.category', 'categories.subCategory', 'author'])->where('slug', $slug)->activated()->first();

        if (!$news) {
            sweetalert()->warning('News not found');
            return redirect()->route('f.home');
        }

        // Related news (same categories)
        $categoryIds = $news->categories->pluck('category_id');
        $related_news = Post::whereHas('categories', fn($q) => $q->whereIn('category_id', $categoryIds))
            ->where('id', '!=', $news->id)
            ->activated()
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Increment visitors (real + some random for simulation)
        $news->increment('visitors', rand(1, 10));

        $data = [
            'news' => $news,
            'related_news' => $related_news,
            'categories' => Category::with(['subCategories'])->activated()->get(),
        ];

        // Breadcrumbs
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('f.home')],
        ];
        if ($news->categories->first()) {
            $cat = $news->categories->first()->category;
            $breadcrumbs[] = ['name' => $cat->name, 'url' => route('f.category.index', $cat->slug)];
            if ($news->categories->first()->subCategory) {
                $sub = $news->categories->first()->subCategory;
                $breadcrumbs[] = ['name' => $sub->name, 'url' => route('f.category.index', [$cat->slug, $sub->slug])];
            }
        }
        $breadcrumbs[] = ['name' => $news->title, 'url' => route('f.news', $news->slug)];

        // SEO for article
        $this->setupSEO(
            $news->title . ' | The Reporter 24',
            $news->description,
            $news->keywords,
            storage_url($news->image),
            'article',
            'NewsArticle',
            $breadcrumbs
        );

        // Additional NewsArticle schema fields
        JsonLd::addValue('headline', $news->title);
        JsonLd::addValue('datePublished', $news->post_date->toIso8601String());
        JsonLd::addValue('dateModified', $news->updated_at->toIso8601String());
        JsonLd::addValue('author', [
            '@type' => 'Person',
            'name'  => $news->author->name ?? 'The Reporter 24', // fallback if author missing
        ]);
        JsonLd::addValue('image', [
            '@type'  => 'ImageObject',
            'url'    => storage_url($news->image),
            'width'  => 1200,
            'height' => 630,
        ]);
        // Optional but recommended for news articles
        JsonLd::addValue('mainEntityOfPage', [
            '@type' => 'WebPage',
            '@id'   => url()->current(),
        ]);

        return view('frontend.news.single', $data);
    }
}
