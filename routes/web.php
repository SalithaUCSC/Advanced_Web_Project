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
// Route::get('/products', 'PagesController@products');

// Route::get('/phone/{phone_id}', 'PagesController@phone');

Route::resource('phones', 'PhonesController');
Route::resource('posts', 'PostsController');
// Route::resource('brands', 'BrandsController');
// Route::resource('user', 'UserController');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'PagesController@profile');
    Route::get('/edit_user', 'PagesController@edit_user');
});

Route::get('/search', 'PagesController@search');
 Route::get('/brand/{$id}', function ($id) {
     return view('phones.brands');
 });

// Route::get('/brand/{{$id}}', );
// Route::get('/profile', 'UsersController@index');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Auth::routes();

