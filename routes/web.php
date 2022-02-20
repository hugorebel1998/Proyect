<?php
// use Illuminate\Routing\Route;

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

//Rutas de estudiantes
Route::get('/estudiantes', 'EstudianteController@index')->name('estudiantes.index');
Route::get('/estudiante/create', 'EstudianteController@create')->name('estudiante.create');
Route::post('/estudiant/store', 'EstudianteController@store')->name('estudiante.store');
Route::get('/estudiante/edit/{estudiante}', 'EstudianteController@edit')->name('estudiante.edit');
Route::put('/estudiante/update', 'EstudianteController@update')->name('estudiante.update');
Route::delete('/estudiante/delete/{estudiante}', 'EstudianteController@delete')->name('estudiante.delete');


//Routas de grupos

Route::get('/grupos', 'GrupoController@index')->name('grupos.index');
Route::get('/grupo/create', 'GrupoController@create')->name('grupo.create');
Route::post('/grupo/store', 'GrupoController@store')->name('grupo.store');
Route::get('/grupo/edit/{grupo}', 'GrupoController@edit')->name('grupo.edit');
Route::put('/grupo/update', 'GrupoController@update')->name('grupo.update');
Route::delete('/grupos/delete/{grupo}', 'GrupoController@delete')->name('grupo.delete');
