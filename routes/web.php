<?php

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('login', 'Back\AuthController@login')->name('login');
    Route::post('login', 'Back\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAuthenticated')->group(function () {
    // ARTICLE ROUTE
    Route::get('/articles/list/deleted', 'Back\ArticleController@deleted')->name('article.deleted');
    Route::get('/articles/switch', 'Back\ArticleController@switch')->name('article.switch');
    Route::get('/articles/recover/article/{id}', 'Back\ArticleController@recover')->name('article.recover');
    Route::delete('/articles/hardDelete/article/{id}', 'Back\ArticleController@hardDelete')->name('article.hard.delete');
    Route::resource('/articles', 'Back\ArticleController');

    //CATEGORY ROUTE
    Route::get('/categories', 'Back\CategoryController@index')->name('category.index');
    Route::get('/category/status', 'Back\CategoryController@switch')->name('category.switch');
    Route::post('/category/create', 'Back\CategoryController@create')->name('category.create');
    Route::post('/category/update', 'Back\CategoryController@update')->name('category.update');
    Route::post('/category/delete', 'Back\CategoryController@delete')->name('category.delete');
    Route::get('/category/get/data', 'Back\CategoryController@getData')->name('category.get.data');

    // PAGE ROUTE
    Route::get('/page', 'Back\PageController@index')->name('page.index');
    Route::get('/page/switch', 'Back\PageController@switch')->name('page.switch');
    Route::get('/page/create', 'Back\PageController@create')->name('page.create');
    Route::post('/page/create', 'Back\PageController@post')->name('page.post');
    Route::get('/page/edit/{id}', 'Back\PageController@update')->name('page.edit');
    Route::put('/page/edit/{id}', 'Back\PageController@editPost')->name('page.edit.post');
    Route::delete('/page/delete/{id}', 'Back\PageController@deletePost')->name('page.delete');
    Route::get('/page/order', 'Back\PageController@orders')->name('page.order');

    //CONFIG ROUTE
    Route::get('/config', 'Back\ConfigController@index')->name('config.index');
    Route::post('/config/update', 'Back\ConfigController@update')->name('config.update');

    // ADMIN PANEL ROUTE
    Route::get('/panel', 'Back\Dashboard@index')->name('dashboard');
    Route::get('/logout', 'Back\AuthController@logout')->name('logout');
});

// FRONTEND ROUTES
Route::get('/', 'Front\Homepage@index')->name('homepage');
Route::get('/contact', 'Front\Homepage@contact')->name('contact');
Route::post('/contact', 'Front\Homepage@contactPost')->name('contact.post');
Route::get('/category/{category}', 'Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}', 'Front\Homepage@single')->name('single');
Route::get('/{page}', 'Front\Homepage@page')->name('page');
Route::get('/site-maintenance', function () { return view('front.offline'); });
