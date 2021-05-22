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
    Route::get('donation-info', 'SiteController@donate')->name('donate');
    
    Route::get('tin-tuc', 'SiteController@post')->name('news');
    Route::get('tin-tuc/{hash}', 'SiteController@detailPost')->name('detailNews');
    
    Route::get('thanh-tich', 'SiteController@post')->name('achievements');
    Route::get('thanh-tich/{hash}', 'SiteController@detailPost')->name('detailAchievements');

    Route::get('su-kien', 'SiteController@post')->name('event');
    Route::get('su-kien/{hash}', 'SiteController@detailPost')->name('detailEvents');

    Route::get('danh-muc-su-kien/{hash}', 'SiteController@categoryEvent')->name('categoryEvent');
});
