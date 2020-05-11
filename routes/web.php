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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('teams', 'TeamController');
    Route::resource('players', 'PlayerController');
    Route::resource('matches', 'MatchController');
    Route::get('show', 'UsersDataController@create');
    Route::get('index', 'UsersDataController@index');
    Route::get('teamindex', 'TeamController@teamindex');
    Route::get('playerindex', 'PlayerController@playerindex');
    Route::get('matachindex', 'MatchController@matachindex');
});

