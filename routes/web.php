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

Route::resource('phones', 'PhonesController', [
    'names' => [
        'index' => 'phones',
        'show' => 'show_phone',
    ]
]);

Route::paginate('/phones', 'PhonesController@index');

Route::resource('posts', 'PostsController');

Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider')->name('glogin');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback')->name('gcallback');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', 'UserController', [
        'names' => [
            'edit' => 'editUser',
            'show' => 'profile'
        ]
    ]);
    Route::put('/updateReview/{id}', 'ReviewsController@updateReview');
    Route::get('/deleteReview/{id}', 'ReviewsController@deleteReview');
    Route::post('reply_review', 'ReviewsController@replyReview');
//    Route::post('add_review', 'ReviewsController@addReview');
    Route::post('post_review', 'ReviewsController@postReview')->name('post_review');
    Route::get('/phones/reviews/{id}/create', 'ReviewsController@create')->name('create_review');
    Route::get('/like/{id}', 'PagesController@likePhone')->name('like');
    Route::get('/dislike{id}', 'PagesController@dislikePhone')->name('dislike');
    Route::get('/cart/checkout', 'CartController@checkout');
    Route::get('/wishlist', 'CartController@wishlist')->name('wishlist');
    Route::get('/users/updatePwd/{id}', 'UserController@updatePwd')->name('updatePwd');
});

Route::get('/phones/reviews/{id}', 'ReviewsController@index')->name('review');
Route::get('/phones/review/{rid}', 'ReviewsController@getReview')->name('review_single');

Route::get('/price_list/get_data', 'PagesController@getPhones')->name('get_data');

Route::get('/phones/compare/{id}', 'PagesController@compare');

Route::get('/cart', 'CartController@index');
Route::post('order', 'CartController@order');

Route::post('addToWishlist', 'CartController@addToWishlist');
Route::get('/removeWish/{id}', 'CartController@removeWish');

Route::get('/cart/add/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@removeItem');
Route::get('/cart/update/{id}', 'CartController@update');

//Route::get('/cart/move/{id}', 'CartController@moveToCart');

Route::get('/login', 'LoginController@showLoginForm');

Route::get('/password/reset', 'ForgotPasswordController@showResetForm');

Route::get('/phoneFilter', 'PagesController@phoneFilter');
Route::get('/comparePhone', 'PagesController@comparePhone');

Route::get('/search', 'PagesController@search');

Route::get('/notFound', 'PagesController@notFound')->name('notFound');

Route::get('/price_list', 'PagesController@getPrices');
Route::get('/pdf', 'PagesController@getPdf');

Route::get('/search_product', 'PagesController@product_search');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


