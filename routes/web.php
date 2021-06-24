<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/hi/{name}', function (string $name) {
    return "Hello, {$name}";
});

Route::get('/categories', function () {
    return "<h1>Категории:</h1> <br><a href='/'>Назад</a>";
});

Route::get('/goods', function () {
    return "<h1>Товары:</h1> <br><a href='/'>Назад</a>";
});

Route::get('/cart', function () {
    return "<h1>Корзина пуста</h1> <br><a href='/'>Назад</a>";
});