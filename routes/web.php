<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\GoodsController as GoodsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\GoodsController as AdminGoodsController;
use App\Http\Controllers\CategoryController as CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** A D M I N  panel*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('goods', AdminGoodsController::class);
});


Route::get('/', function () {
    return view('index');
});

Route::get('/goods', [GoodsController::class, 'index'])
    ->name('/goods');
Route::get('/goods/show/{id}', [GoodsController::class, 'show'])
    ->where('id', '\d+')
    ->name('goods.show');
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('/categories');
Route::get('/cart', function () {
    return '<a href="/">Главная</a> <br> Корзина пуста';
});
Route::get('categories/show/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');
