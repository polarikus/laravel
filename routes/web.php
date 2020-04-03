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
    Route::get('/{id}', 'NewsController@show')->name('One');
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
    'as' => 'Admin'
],function (){
    Route::get('/', 'IndexController@index')->name('');
    Route::match(['get', 'post'],'addNews', 'IndexController@addNews')->name('.addNews');
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
Route::get('/api', 'NewsController@api');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
