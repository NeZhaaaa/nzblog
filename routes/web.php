<?php

use Illuminate\Support\Facades\DB;

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

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/','ArticleController@index');

Route::get('/task','TaskController@index');

Route::get('/article/{article}','ArticleController@show');

Route::post('/article/{article}/comments','CommentController@store');

Route::get('/tag/{tag}', 'ArticleController@tag_index');

Route::get('/category/{category}', 'ArticleController@category_index');

Route::get('/subject/{subject}', 'ArticleController@subject_index');

Route::get('/archive', 'ArticleController@index');

Route::group([
    'namespace' => 'Api', 
    'prefix' => 'api'
], function(){
    Route::get('/categories', 'ApiController@categories');
    Route::get('/subjects', 'ApiController@subjects');
});

// Route::group(['namespace' => 'Admin','prefix' => 'admin'],function(){
//     Route::get('/', 'HomeController@index');
//     Route::get('article/create', 'ArticleController@create');
//     Route::resource('article', 'ArticleController');
// });


