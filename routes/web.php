<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\GoodsController as AdminGoodsController;
use App\Http\Controllers\IndexController as IndexController;
use App\Http\Controllers\GoodsController as GoodsController;
use App\Http\Controllers\CategoryController as CategoryController;

/** A D M I N  panel*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'admin.index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('goods', AdminGoodsController::class);
});


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

Route::get('collections', function () {
    $collections = collect([
        1, 2, 3, 45, 67, 8, 9, 54, 67
    ]);
    dd($collections->chunk(3));
});
