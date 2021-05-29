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

Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::get('/', 'SiteController@index')->name('index');
    Route::get('gioi-thieu', 'SiteController@about')->name('about');
    Route::get('san-pham', 'SiteController@products')->name('products');
    Route::get('san-pham/{slug}', 'SiteController@detailProducts')->name('detailProducts');

    Route::get('blog', 'SiteController@blog')->name('blog');
    Route::get('blog/{slug}', 'SiteController@detailBlog')->name('detailBlog');

    Route::get('event', 'SiteController@event')->name('event');
    Route::get('lien-he', 'SiteController@contact')->name('contact');
    Route::group(['prefix' => 'thanh-vien' , 'middleware' => 'auth'], function () {
        Route::get('{id}', 'UsersController@getInfo')->name('users-fe.index');
        Route::get('{id}/history', 'UsersController@history')->name('users-fe.history');
        Route::get('{id}/history/{ordersID}', 'UsersController@detailOrders')->name('users-fe.detailOrders');
        Route::get('{id}/check-orders', 'UsersController@checkOrders')->name('users-fe.checkOrders');
    });
});

Route::post('post-login', 'SiteController@postLogin')->name('post-login');
Route::get('logout', 'UsersController@logout')->name('users-fe.logout');
Route::post('comment', 'SiteController@postComment')->name('users-fe.post-comment');
