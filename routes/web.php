<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileControlController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'b.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
    });

    Route::post('/file-upload/process', [FileControlController::class, 'upload'])->name('file.upload');

    // Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        // Route::get('index', 'index')->name('permission_list');
    // });



});
