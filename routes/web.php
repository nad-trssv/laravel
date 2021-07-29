<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\GoodsController as AdminGoodsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\GoodsController as GoodsController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;

//site
Route::get('/', [IndexController::class, 'index'])
    ->name('/');

Route::get('/goods', [GoodsController::class, 'index'])
    ->name('/goods');
Route::get('/goods/{goods}', [GoodsController::class, 'show'])
    ->where('goods', '\d+')
    ->name('goods.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('/categories');
Route::get('categories/show/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');

Route::get('/cart', function () {
    return '<a href="/">Главная</a> <br> Корзина пуста';
});

Route::get('session', function () {
    session(['newSession' => 'newValue']);
    if (session()->has('newSession')) {
        session()->remove('newSession');
    }
    return "no sessions ";
});

//backoffice
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('goods', AdminGoodsController::class);

        Route::get('/parse', ParserController::class);
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/init/{driver?}', [SocialController::class, 'init'])
        ->name('social.init');
    Route::get('/callback/{driver?}', [SocialController::class, 'callback'])
        ->name('social.callback');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
