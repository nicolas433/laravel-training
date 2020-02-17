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
    return view('auth.login');
});

Auth::routes();

Route::get   ('/home',             'HomeController@index'  )->name('home');

Route::get   ('/todo/new',         'TodoController@create' )->name('todo');
Route::post  ('/todo',             'TodoController@store'  );
Route::delete('/todo/delete/{id}', 'TodoController@destroy');
Route::get   ('/todo/edit/{id}',   'TodoController@edit'   );
Route::put   ('/todo/{id}',        'TodoController@update' );
