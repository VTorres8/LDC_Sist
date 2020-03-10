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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/reservas','reservasController');
Route::resource('/reservas/maq','reservaMaquinaController');
Route::resource('/preparadores','preparadorController');
Route::resource('/horarios','horarioController');
Route::resource('/salas', 'salasController');

Route::resource('/maquinas','maquinasController');
Route::resource('/gestion','adminReservasController');

//Route::get('/preparadores', 'PreparadorController@index');

Route::get('/maquinas/create/{id}', 'maquinasController@create');

Route::get('/salas/{id}/maquinas', 'maquinasController@index');

Route::get('/reservas/solicitud/materia/{id}', 'reservasController@solicitud');
Route::get('/reservas/solicitud/materia/{id}/turno', 'reservasController@solicitudTurno');
Route::get('/reservas/solicitud/evento/{id}/turno', 'reservasController@solicitudTurnoEvento');

Route::get('/reservas/solicitud/evento/{id}', 'reservasController@solicitudEvento');
Route::get('/reservas/solicitud/maquina/{id}', 'reservaMaquinaController@solicitudMaquina');
Route::get('/reservas/solicitud/maquina/{id}/form', 'reservaMaquinaController@formReserva');
Route::get('/reservas/solicitud/maquina/{id}/form/turno', 'reservaMaquinaController@formReservaTurno');
//Route::get('/preparadores/todas', 'PerfilController@create');
//Route::post('/preparadores', 'PerfilController@store');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
