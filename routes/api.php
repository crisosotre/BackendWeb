<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('tipo_usuarios', 'TipoUsuarioAPIController');







Route::resource('usuarios', 'UsuarioAPIController');

Route::resource('materias', 'MateriaAPIController');

Route::resource('asistencias', 'AsistenciaAPIController');



Route::resource('observacions', 'ObservacionAPIController');