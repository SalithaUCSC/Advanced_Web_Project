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

Route::get('/', 'PagesController@index');
Route::get('/brand/{id}', 'PagesController@brand');
Route::get('/search_product/{{name}}', 'PagesController@product_search');
Route::resource('phones', 'PhonesController');
Route::resource('posts', 'PostsController');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'PagesController@profile');
    Route::get('/user/edit', 'PagesController@edit_user');
});

Route::get('/cart', 'CartController@index');
Route::get('/cart/add/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@removeItem');
Route::get('/cart/update/', 'CartController@update');

Route::get('/search', 'PagesController@search');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


