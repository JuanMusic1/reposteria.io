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
    return view('layouts.main');
});

//Index
Route::get('/tasks', 'TasksController@index');
//Save
Route::post('/tasks', 'TasksController@store');
//Create
Route::get('/tasks/create', 'TasksController@create');
//Show
Route::get('/tasks/{task}', 'TasksController@show');
//Edit
Route::get('/tasks/{task}/edit', 'TasksController@edit');
//Update
Route::patch('/tasks/{task}', 'TasksController@update');
//Delete
Route::delete('/tasks/{task}', 'TasksController@destroy');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
