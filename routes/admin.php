<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/22/18
 * Time: 10:45 PM
 */

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', 'AdminsLoginController@getLogin')->name('login.get');
        Route::get('logout', 'AdminsLoginController@logout')->name('login.logout');
        Route::post('/', 'AdminsLoginController@login')->name('login.post');
    });
});
Route::group(['prefix' => 'admin', 'middleware' => 'admins'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    //Route::get('settings', 'DashboardController@index')->name('admin.settings');
    //
    Route::group(['prefix' => 'stated'], function () {
        Route::get('/', 'StatedController@index')->name('stated.index');
        Route::get('add', 'StatedController@create')->name('stated.create');
        Route::post('add', 'StatedController@store')->name('stated.store');
        Route::get('edit/{id}', 'StatedController@show')->name('stated.show');
        Route::post('edit', 'StatedController@update')->name('stated.update');
        Route::get('delete/{id}', 'StatedController@destroy')->name('stated.destroy');
        Route::get('clone/{id}', 'StatedController@clone')->name('stated.clone');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::group(['prefix' => 'cate'], function () {
            Route::get('/', 'PostCateController@index')->name('post.cate.index');
            Route::get('add', 'PostCateController@create')->name('post.cate.create');
            Route::post('add', 'PostCateController@store')->name('post.cate.store');
            Route::get('edit/{id}', 'PostCateController@show')->name('post.cate.show');
            Route::post('edit', 'PostCateController@update')->name('post.cate.update');
            Route::get('delete/{id}', 'PostCateController@destroy')->name('post.cate.destroy');
        });
        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('add', 'PostController@create')->name('post.create');
        Route::post('add', 'PostController@store')->name('post.store');
        Route::get('edit/{id}', 'PostController@show')->name('post.show');
        Route::post('edit', 'PostController@update')->name('post.update');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');
        Route::get('clone/{id}', 'PostController@clone')->name('post.clone');
    });
    //Page
    Route::group(['prefix' => 'page'], function () {
        Route::get('/', 'PageController@index')->name('page.index');
        Route::get('add', 'PageController@create')->name('page.create');
        Route::post('add', 'PageController@store')->name('page.store');
        Route::get('edit/{id}', 'PageController@show')->name('page.show');
        Route::post('edit', 'PageController@update')->name('page.update');
        Route::get('delete/{id}', 'PageController@destroy')->name('page.destroy');
    });
    //slider
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', 'SliderController@index')->name('slider.index');
        Route::get('add', 'SliderController@create')->name('slider.create');
        Route::post('add', 'SliderController@store')->name('slider.store');
        Route::get('edit/{id}', 'SliderController@show')->name('slider.show');
        Route::post('edit', 'SliderController@update')->name('slider.update');
        Route::get('delete/{id}', 'SliderController@destroy')->name('slider.destroy');
    });
    //slider
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'ContactController@index')->name('contact.index');
        Route::get('add', 'ContactController@create')->name('contact.create');
        Route::post('add', 'ContactController@store')->name('contact.store');
        Route::get('edit/{id}', 'ContactController@show')->name('contact.show');
        Route::post('edit', 'ContactController@update')->name('contact.update');
        Route::get('delete/{id}', 'ContactController@destroy')->name('contact.destroy');
    });
    //TEAM
    Route::group(['prefix' => 'team'], function () {
        Route::get('/', 'TeamController@index')->name('team.index');
        Route::get('add', 'TeamController@create')->name('team.create');
        Route::post('add', 'TeamController@store')->name('team.store');
        Route::get('edit/{id}', 'TeamController@show')->name('team.show');
        Route::post('edit', 'TeamController@update')->name('team.update');
        Route::get('delete/{id}', 'TeamController@destroy')->name('team.destroy');
    });
    //settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('overview', 'SettingsController@index')->name('settings.overview');
        Route::post('overview', 'SettingsController@update')->name('settings.overview');
        Route::get('translation', 'SettingsController@translation')->name('settings.translation');
        Route::get('custom', 'SettingsController@custom')->name('settings.custom');
        Route::post('custom', 'SettingsController@updateCustom')->name('settings.custom');

    });
    //Products
    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'cate'], function () {
            Route::get('/', 'ProductsCateController@index')->name('products.cate.index');
            Route::get('add', 'ProductsCateController@create')->name('products.cate.create');
            Route::post('add', 'ProductsCateController@store')->name('products.cate.store');
            Route::get('edit/{id}', 'ProductsCateController@show')->name('products.cate.show');
            Route::post('edit', 'ProductsCateController@update')->name('products.cate.update');
            Route::get('delete/{id}', 'ProductsCateController@destroy')->name('products.cate.destroy');
        });
        Route::group(['prefix' => 'attributes'], function () {
            Route::get('/', 'ProductsAttributesController@index')->name('products.attributes.index');
            Route::get('add', 'ProductsAttributesController@create')->name('products.attributes.create');
            Route::post('add', 'ProductsAttributesController@store')->name('products.attributes.store');
            Route::get('edit/{id}', 'ProductsAttributesController@show')->name('products.attributes.show');
            Route::post('edit', 'ProductsAttributesController@update')->name('products.attributes.update');
            Route::get('delete/{id}', 'ProductsAttributesController@destroy')->name('products.attributes.destroy');
        });
        Route::get('/', 'ProductsController@index')->name('products.index');
        Route::get('add', 'ProductsController@create')->name('products.create');
        Route::post('add', 'ProductsController@store')->name('products.store');
        Route::get('edit/{id}', 'ProductsController@show')->name('products.show');
        Route::post('edit', 'ProductsController@update')->name('products.update');
        Route::get('delete/{id}', 'ProductsController@destroy')->name('products.destroy');
        Route::get('clone/{id}', 'ProductsController@clone')->name('products.clone');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrdersController@index')->name('orders.index');
        Route::get('add', 'OrdersController@create')->name('orders.create');
        Route::post('add', 'OrdersController@store')->name('orders.store');
        Route::get('edit/{id}', 'OrdersController@show')->name('orders.show');
        Route::post('edit', 'OrdersController@update')->name('orders.update');
        Route::get('delete/{id}', 'OrdersController@destroy')->name('orders.destroy');
        Route::get('clone/{id}', 'OrdersController@clone')->name('orders.clone');
        Route::post('confirm-status-orders', 'OrdersController@confirmStatusOrders')->name('orders.confirmStatusOrders');
        Route::get('export-excel', 'OrdersController@exportExeclForOrders')->name('orders.exportExeclForOrders');
    });
    //achievements
    Route::group(['prefix' => 'achievements'], function () {
        Route::get('/', 'AchievementsController@index')->name('achievements.index');
        Route::get('add', 'AchievementsController@create')->name('achievements.create');
        Route::post('add', 'AchievementsController@store')->name('achievements.store');
        Route::get('edit/{id}', 'AchievementsController@show')->name('achievements.show');
        Route::post('edit', 'AchievementsController@update')->name('achievements.update');
        Route::get('delete/{id}', 'AchievementsController@destroy')->name('achievements.destroy');
        Route::get('clone/{id}', 'AchievementsController@clone')->name('achievements.clone');
    });


    Route::resource('tags', 'TagsController');
    // Thành viên admin 
    Route::group(['prefix' => 'member'], function () {
        Route::get('/', 'MemberController@index')->name('member.index');
        Route::get('add', 'MemberController@create')->name('member.create');
        Route::post('add', 'MemberController@store')->name('member.store');
        Route::get('edit/{id}', 'MemberController@show')->name('member.show');
        Route::post('edit', 'MemberController@update')->name('member.update');
        Route::post('checkEmail', 'MemberController@checkEmail')->name('member.checkEmail');
        Route::get('delete/{id}', 'MemberController@destroy')->name('member.destroy');
    });
    // Thành viên khách hàng
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index')->name('users.index');
        Route::get('add', 'UsersController@create')->name('users.create');
        Route::post('add', 'UsersController@store')->name('users.store');
        Route::get('edit/{id}', 'UsersController@show')->name('users.show');
        Route::post('edit', 'UsersController@update')->name('users.update');
        Route::post('checkEmail', 'UsersController@checkEmail')->name('users.checkEmail');
        Route::get('delete/{id}', 'UsersController@destroy')->name('users.destroy');
    });
    //
    Route::get('messages', 'ElementController@messages')->name('admin.messages');
    Route::post('messages', 'ElementController@postMessages')->name('admin.messages');
    Route::group(['prefix' => 'coporations'], function () {
        Route::get('/', 'ElementController@CIndex')->name('coporations.index');
        Route::get('add', 'ElementController@CCreate')->name('coporations.create');
        Route::post('add', 'ElementController@CStore')->name('coporations.store');
        Route::get('edit/{id}', 'ElementController@CShow')->name('coporations.show');
        Route::post('edit', 'ElementController@CUpdate')->name('coporations.update');
        Route::get('delete/{id}', 'ElementController@CDestroy')->name('coporations.destroy');
    });
    Route::group(['prefix' => 'organizations'], function () {
        Route::get('/', 'ElementController@OIndex')->name('organizations.index');
        Route::get('add', 'ElementController@OCreate')->name('organizations.create');
        Route::post('add', 'ElementController@OStore')->name('organizations.store');
        Route::get('edit/{id}', 'ElementController@OShow')->name('organizations.show');
        Route::post('edit', 'ElementController@OUpdate')->name('organizations.update');
        Route::get('delete/{id}', 'ElementController@ODestroy')->name('organizations.destroy');
    });
    //Page
    Route::group(['prefix' => 'sponsor'], function () {
        Route::get('/', 'SponsorController@index')->name('sponsor.index');
        Route::get('add', 'SponsorController@create')->name('sponsor.create');
        Route::post('add', 'SponsorController@store')->name('sponsor.store');
        Route::get('edit/{id}', 'SponsorController@show')->name('sponsor.show');
        Route::post('edit', 'SponsorController@update')->name('sponsor.update');
        Route::get('delete/{id}', 'SponsorController@destroy')->name('sponsor.destroy');
    });
});


