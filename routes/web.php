<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Группа роутов новостей
|--------------------------------------------------------------------------
|
| Тут у нас группа роутов с новостными функциями
|
*/

Route::group([
    'prefix' => 'news',
    'as' => 'News'
],function (){
    Route::get('/', 'NewsController@index')->name('');
    Route::get('/{news}', 'NewsController@show')->name('One');
    Route::get('/category/{name}', 'NewsController@category')->name('CategoryOne');
});
/*
|--------------------------------------------------------------------------
| Группа роутов для админки
|--------------------------------------------------------------------------
|
| Тут у нас группа роутов для админкм
|
*/

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
],function (){
    Route::get('/', 'IndexController@index')->name('');
    Route::match(['get', 'post'],'/create/news', 'NewsController@create')->name('create');
    Route::get('/edit/news/{news}', 'NewsController@edit')->name('edit');
    Route::post('/update/news/{news}', 'NewsController@update')->name('update');
    Route::get('/export/{name}', 'NewsController@export')->name('export');
    Route::get('/destroy/news/{news}', 'NewsController@destroy')->name('destroy');
    Route::match(['get', 'post'], '/update/profile', 'ProfileController@update')->name('updateProfile');
});

/*
|--------------------------------------------------------------------------
| Не группированные роуты
|--------------------------------------------------------------------------
|
| Тут у нас не группированные роуты
|
*/

Route::get('/', 'HomeController@index')->name('Home');
Route::get('/contacts', 'HomeController@contacts')->name('Contacts');
Route::get('/login', 'HomeController@login')->name('Login');
Route::get('/categories', 'NewsController@categories')->name('Categories');
Route::match(['get', 'post'], '/update/profile', 'ProfileController@update')->name('updateProfile')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
