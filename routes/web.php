<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'b.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        // Route::get('index', 'index')->name('permission_list');
    // });


});
