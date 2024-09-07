<?php

use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileControlController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdvertisementController as BackendAdvertisementController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Frontend\AdvertisementController as FrontendAdvertisementController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\MultipleNewsController;
use App\Http\Controllers\Frontend\SingleNewsPageController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\LatestNewsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\AuthorController as FrontendAuthorController;


Auth::routes();



Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/news/{slug}', [SingleNewsPageController::class, 'index'])->name('news');


    Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/submit', 'contact_submit')->name('submit');
    });

    Route::controller(MultipleNewsController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/{category_slug}/{sub_category_slug?}', 'index')->name('index');
    });
    Route::controller(FrontendAuthorController::class)->prefix('author')->name('author.')->group(function () {
        Route::get('/news/{author_id}', 'news')->name('news');
    });

    Route::controller(LatestNewsController::class)->prefix('latest-news')->name('latest.')->group(function () {
        Route::get('/{type}', 'index')->name('get');
    });

    Route::controller(FrontendAdvertisementController::class)->prefix('advertisement')->name('advertisement.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/advertisement', 'advertisement_submit')->name('submit');
    });


    Route::get('/get-ad/{key}', [FrontendAdvertisementController::class, 'get'])->name('get.ads');

});

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'b.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });
    Route::controller(SubCategoryController::class)->prefix('sub-category')->name('sub_category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });

    Route::post('/file-upload/process', [FileControlController::class, 'upload'])->name('file.upload');


    Route::controller(AuthorController::class)->prefix('author')->name('author.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });


    Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });


    Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function () {
        Route::post('subcategories', 'subcategories')->name('subcategories');
    });

    Route::get('/migration', function () {
        Artisan::call('migrate:fresh --seed');
    });


    Route::get('/cache-clear', function () {
        Artisan::call('optimize:clear');
    });



    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });

    Route::controller(BackendAdvertisementController::class)->prefix('advertisement')->name('ads.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
    });

});
