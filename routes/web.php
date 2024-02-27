<?php

use Illuminate\Support\Facades\Route;
use Dbfx\LaravelStrapi\LaravelStrapi;


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

// Route::get('/strapi', 'StrapiController@getDataFromStrapi');
Route::get('/strapi', 'App\Http\Controllers\StrapiController@getDataFromStrapi');
Route::get('/strapi/{id}', 'App\Http\Controllers\StrapiController@getDetailProduct');
Route::get('strapi/deleteproduk/{id}', 'App\Http\Controllers\StrapiController@deleteProduct');
Route::get('addproduct', 'App\Http\Controllers\StrapiController@addproduct');
Route::post('addStapiproduct', 'App\Http\Controllers\StrapiController@addStapiproduct');