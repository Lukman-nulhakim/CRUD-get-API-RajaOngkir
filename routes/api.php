<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------TOKO----------------------
Route::post('/create-product', 'TokoController@create');
Route::get('/get-product', 'TokoController@index');
Route::get('/get-product/{id}', 'TokoController@show');
Route::get('/search-product', 'TokoController@search');
Route::patch('/update-product/{id}',  'TokoController@update');
Route::delete('/delete-product/{id}',  'TokoController@destroy');


//-----------Seminar-----------------------
Route::get('/get-acara', 'SeminarController@index');
Route::post('/create-acara','SeminarController@create');