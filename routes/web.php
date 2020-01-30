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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{provider}/auth', 'SocialsController@auth')->name('social.auth');

Route::get('{provider}/redirect', 'SocialsController@auth_callback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelsController');
    
    Route::get('discussion/create', 'DiscussionsController@create')->name('discussions.create');
    Route::post('discussion/store', 'DiscussionsController@store')->name('discussions.store');
    
    Route::get('discussion/{slug}', 'DiscussionsController@show')->name('discussions.show');
});


