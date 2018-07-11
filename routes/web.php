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



Route::resource('profile','UserController');

Route::get('postskill','PostskillController@create')->name('postskills.get');
Route::get('postskill','PostskillController@store')->name('postskills.store');

Route::get('postintro','PostintroController@create');

Route::resource('profile','UserController');

Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);

Route::get('mypage/{id}', 'UserController@show')->name('user.show');
Route::get('skill', 'PostskillController@show')->name('skill.create');
Route::get('intro', 'PostintroController@show')->name('intro.create');
// createは後程skill.introの詳細ページを作成するときにshowを使う予定なのでcreateにしている

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
    Route::post('follow', 'UserFollowController@store')->name('user.follow');
    Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
    Route::get('follows', 'UserController@user_follows')->name('users.follows');
    Route::get('followers', 'UserController@followers')->name('users.followers');
    Route::get('profile','UserController@show')->name('profile.profile');
});


Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);

Route::resource('profile','UserController');
    
});

