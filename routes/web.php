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

/*
Route::get('/', function () {
    return view('welcome');
    //return 'Home';
});*/

Route::get('/', 'RecetaController@index')->name('index');


//Usuarios
Route::get('/usuarios', 'UserController@index')
    ->name('users.index');
Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');
Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::post('/usuarios', 'UserController@store');
Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
Route::put('/usuarios/{user}', 'UserController@update');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');


//Recetas
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');;
Route::get('/recetas/nueva', 'RecetaController@create')->name('recetas.create');
Route::get('/recetas/{receta}', 'RecetaController@show')
    ->where('receta', '[0-9]+')
    ->name('recetas.show');

Route::post('/recetas', 'RecetaController@store');
Route::get('/recetas/{receta}/editar', 'RecetaController@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update');

Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');