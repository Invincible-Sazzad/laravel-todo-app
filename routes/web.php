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


// Route::get('/todo', 'TodoController@index')->name('todo.index');
// Route::get('/todo/create', 'TodoController@create');
// Route::post('/todo/create', 'TodoController@store');
// Route::patch('/todo/{todo}/update', 'TodoController@update')->name('todo.update');
// Route::delete('/todo/{todo}/delete', 'TodoController@delete')->name('todo.delete');
// Route::get('/todo/{todo}/edit', 'TodoController@edit');


// If we want the user must be authenticated to perform todo actions, we can create a group middleware
// Route::middleware('auth')->group(function () {
    // Route::get('/todo', 'TodoController@index')->name('todo.index');
    // Route::get('/todo/create', 'TodoController@create');
    // Route::post('/todo/create', 'TodoController@store');
    // Route::patch('/todo/{todo}/update', 'TodoController@update')->name('todo.update');
    // Route::delete('/todo/{todo}/delete', 'TodoController@delete')->name('todo.delete');
    // Route::get('/todo/{todo}/edit', 'TodoController@edit');

    // Instead of the above 6 routes, we can use one Resource Route like below
    Route::resource('todo', 'TodoController');

    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');

    Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
// });

// Instead of the above 6 routes, we can use one Resource Route like below
// Route::resource('todo', 'TodoController');


// Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');

// Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
