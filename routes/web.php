<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/blog');
});


// Auth Routes
Route::group(['middleware' => 'guest'], function () {
    // Auth controller Route
    Route::controller(AuthController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerPost')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost')->name('login');
    });


});

Route::group(['middleware' => 'auth'], function () {
    // Home Controller Route
    Route::get('/category', [HomeController::class, 'category']);
    Route::post('/category', [HomeController::class, 'categoryPost'])->name('category');
    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('addBlog');
    Route::post('/blog', [BlogController::class, 'blogPost'])->name('blog');

    // Auth Controller Route
    Route::controller(AuthController::class)->group(function () {
        Route::delete('/logout', 'logout')->name('logout');
    });
});


// Blog controller Route
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
});
