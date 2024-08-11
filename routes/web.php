<?php

use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileControlController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();



Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');

});

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'b.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('details/{id}', 'details')->name('details');
    });
    Route::controller(SubCategoryController::class)->prefix('sub-category')->name('sub_category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
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

    // Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        // Route::get('index', 'index')->name('permission_list');
    // });



});
