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

// Route::get('/', function () {
//     return view('welcome');
// });

// Product
Route::get('/', 'ProductController@index')->name('products.index');
Route::get('/products', 'ProductController@create')->name('products.create');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');

// Category
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/protected', 'ProtectedController@index');
Route::get('/admin', 'AdminController@index');

// Search Engine
Route::get('/search', 'AttractionController@index');

// ngambil API Raja Ongkir
Route::get('page/getprovince', 'PageController@getprovince');
Route::get('page/getcity', 'PageController@getcity');
Route::get('page/checkshipping', 'PageController@checkshipping');
Route::post('page/processShipping', 'PageController@processShipping');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

