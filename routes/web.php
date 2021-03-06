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

Route::resource('posts', 'PostsController');

//ikki
Route::get('mypage/{id}', 'UserController@show')->name('user.profile');
Route::get('postskillcreate', 'PostskillController@create')->name('skills.create');
Route::get('postskillshow','PostskillController@show')->name('skills.show');
Route::delete('postskill{id}','PostskillController@destroy')->name('skills.destroy');
Route::post('postskill','PostskillController@store')->name('skills.store');
Route::post('postintro','PostintroController@store')->name('postintro.store');
Route::get('createintro', 'PostintroController@create')->name('postintro.create');
Route::get('postintroshow','PostintroController@show')->name('postintro.show');
Route::delete('postintrodelete/{id}','PostintroController@destroy')->name('postintro.destroy');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['only' => ['index', 'show']]);
    Route::post('user/image', 'UserController@picture')->name('userimage.store');            

    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('follows', 'UserController@user_follows')->name('users.follows');
        Route::get('followers', 'UserController@followers')->name('users.followers');
        Route::get('profile','UserController@show')->name('profile.show');
        Route::put('profile','ProfileController@update')->name('profile.update');

    });

});

Route::get('/skill/{skill_id}', 'SkillCommentController@show')->name('skills.view');
Route::post('/skill/{skill_id}/comments','SkillCommentController@store')->name('skillcomments.store');
Route::get('/intro/{intro_id}', 'IntroCommentController@show')->name('postintro.view');
Route::post('/intro/{intro_id}/comments','IntroCommentController@store')->name('introcomments.store');

Route::get('/', 'PostsController@index')->name('posts.get');

Route::get('search', 'UserController@FindUser')->name('search');

Route::get('editselfintro/{id}', 'ProfileController@edit')->name('profile.editselfintro');
Route::post('storeselfintro','ProfileController@store')->name('profile.store');
