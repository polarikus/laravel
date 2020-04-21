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
    Route::get('/update/profile', 'ProfileController@update')->name('userShow');
    Route::post('update/profile/{user}', 'ProfileController@update')->name('updateProfile');
    Route::get('/rss', 'ParserController@index')->name('rss');
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
/*
|--------------------------------------------------------------------------
| OAuth для соц сетей
|--------------------------------------------------------------------------
|
| ВК и Github
|
*/
//VK
Route::get('/auth/vk', 'LoginController@loginVk')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@respVk')->name('vkResp');
//Github
Route::get('/auth/git/response', 'LoginController@respGit')->name('gitResp');
Route::get('/auth/git', 'LoginController@loginGit')->name('gitLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
