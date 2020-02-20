<?php

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

Route::get('/', 'PostController@index'); // главная
Route::get('post/', 'PostController@index')->name('post.index'); // добавляем поиск
Route::get('posts/create', 'PostController@create')->name('post.create'); // добавляем маршрут длч создания поста
Route::get('posts/show/{id}', 'PostController@show')->name('post.show'); // добавляем маршрут для чтения поста (параметры/переменные которые передаем указываются в фигурных скобках)
Route::post('posts/', 'PostController@store')->name('post.store'); // добавляем маршрут длч записи поста

