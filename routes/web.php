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


Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('/', 'TimelineController@index');

Route::resource('profile','UserController');

Route::get('mypage/{id}', 'UserController@show')->name('user.show');
Route::get('skill', 'PostskillController@show')->name('skill.create');
Route::get('intro', 'PostintroController@show')->name('intro.create');
// createは後程skill.introの詳細ページを作成するときにshowを使う予定なのでcreateにしている
