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
    return view('welcome');
});

Route::get('/','PageController@home')->name('home');

Route::get('/about','PageController@about')->name('about');

Route::get('/post','PageController@post')->name('post');

Route::get('/contact','PageController@contact')->name('contact');

Route::resource('brand','BrandController');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubcategoryController');
Route::resource('item','ItemController');
Route::resource('order','OrderController');
