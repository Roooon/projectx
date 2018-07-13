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


// Route::get('/', function () {
//     return view('welcome');});

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::resource('posts', 'PostsController@index');

Route::resource('users', 'UserController');

//ikki
Route::get('mypage/{id}', 'UserController@show')->name('user.profile');
Route::get('skill', 'PostskillController@show')->name('skills.create');
Route::get('intro', 'PostintroController@show')->name('intro.create');
Route::get('postskill','PostskillController@store')->name('skills.store');
// createは後程skill.introの詳細ページを作成するときにshowを使う予定なのでcreateにしている

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
    Route::post('follow', 'UserFollowController@store')->name('user.follow');
    Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
    Route::get('follows', 'UserController@user_follows')->name('users.follows');
    Route::get('followers', 'UserController@followers')->name('users.followers');
    Route::get('profile','UserController@show')->name('profile.profile');
});

Route::get('postskill','PostskillController@create')->name('postskills.get');
Route::get('postskill','PostskillController@store')->name('postskills.store');


Route::get('postintro','PostintroController@create');
    
});

Route::get('/', 'PostsController@index')->name('posts.get');