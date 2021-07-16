<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts','PostController')->middleware('auth');
Route::post('posts/{post}/comment','PostController@comment')->name('posts.comment');

Route::get('/login/facebook', 'Auth\SocialLoginController@redirectToFacebook')->name('facebook_redirect');

Route::get('/social-login/facebook','Auth\SocialLoginController@processLoginFacebook');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/category/{category}','PostController@showCategoryPosts')->name('posts.category')->middleware('auth');


