<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class FrontendViewShareProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('frontend.*', function ($view) {
            $view->with('headerCategories', Category::with(['header_subCategories'])->where('is_header', 1)->activated()->latest()->get());
        });
    }
}
