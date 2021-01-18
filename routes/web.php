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
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/receta/nueva', 'RecetaController@create')->name('recetas.create');
Route::get('/receta/{receta}', 'RecetaController@show')
    ->where('receta', '[0-9]+')
    ->name('receta.show');

Route::post('/receta', 'RecetaController@store');
Route::get('/receta/{receta_id}/editar', 'RecetaController@edit')->name('receta.edit');
Route::put('/receta/{receta_id}', 'RecetaController@update')->name('receta.update');
Route::post('/receta/{receta_id}/ingrediente', 'RecetaController@addIngrediente')->name('receta.ingrediente.add');
Route::delete('/receta/{receta_id}/ingrediente', 'RecetaController@delIngrediente')->name('receta.ingrediente.del');
Route::post('/receta/{receta_id}/paso', 'RecetaController@addPaso')->name('receta.paso.add');
Route::delete('/receta/{receta_id}/paso', 'RecetaController@delPaso')->name('receta.paso.del');


Route::delete('/receta/{receta_id}', 'RecetaController@destroy')->name('receta.destroy');
//Route::get('/recetas/{receta}/ingredientes', 'RecetaController@edit')->name('recetas.ingredientes');





Route::get('recetas/livesearch', 'RecetaController@livesearch');
Route::get('recetas/autocomplete', 'RecetaController@autocomplete');
Route::get('recetas/autocomplete/livesearch', 'RecetaController@livesearch');


Route::get('/ingrediente/autocomplete/{nombre}', 'IngredienteController@autocomplete');

Route::post('/ingrediente/complete', 'IngredienteController@complete')->name('complete');