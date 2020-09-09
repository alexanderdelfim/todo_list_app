<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

//Rotas GET
Route::get('/home', 'HomeController@index')->name('home');
Route::get('todos/', 'TodoController@index')->name('todos.index')->middleware('auth');
Route::get('todos/add-todo', 'TodoController@add')->name('todos.add')->middleware('auth');
Route::get('todos/edit/{todo}', 'TodoController@edit')->name('todos.edit')->middleware('auth');

// Rotas POST
Route::post('/todo/store/', 'TodoController@store')->name('todo.store')->middleware('auth');

//Rotas PUT
Route::put('todo/{todo}/update', 'TodoController@update')->name('todo.update')->middleware('auth');
Route::put('todo/{todo}/complete', 'TodoController@complete')->name('todo.complete')->middleware('auth');

//Rotas DELETE
Route::delete('todo/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete')->middleware('auth');
Route::delete('todo/{todo}/delete', 'TodoController@delete')->name('todo.delete')->middleware('auth');

Auth::routes();

