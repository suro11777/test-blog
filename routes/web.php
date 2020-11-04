<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/article/{slug}', 'ArticleController@getArticleBySlug')->name('article.show');

Route::post('/like-form/{id}', 'ArticleController@addCountLike')->name('article.like');
Route::post('/count-watch/{id}', 'ArticleController@addCountWatch')->name('article.watch');
Route::post('/comment-form', 'CommentController@addComment')->name('article.comment.add');
Route::get('/articles/{tag_id?}', 'ArticleController@index')->name('articles.index');
