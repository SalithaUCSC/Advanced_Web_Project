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
Route::resource('phones', 'PhonesController');
Route::resource('posts', 'PostsController');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'PagesController@profile');
    Route::get('/edit_user', 'PagesController@edit_user');
});

Route::get('/search', 'PagesController@search');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


