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

//Welcome
Route::get('/', function () {
    return view('welcome');
});

//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Another shit
Route::get('/exercises/create/{tag}', 'ExerciseController@create')->name('exercise.create');
Route::resource('exercises', 'ExerciseController');
Route::resource('tags', 'TagController');
Route::resource('files', 'FileController');
