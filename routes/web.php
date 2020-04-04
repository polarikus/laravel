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
    Route::match(['get', 'post'],'addNews', 'IndexController@newNews')->name('.addNews');
    Route::get('/export/{name}', 'IndexController@export')->name('.export');
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

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
