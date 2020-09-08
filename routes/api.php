<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/usuarios', 'UserController@index');

Route::resource('atividades', AtividadeController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::patch('atividades/{atividade}/concluir', 'AtividadeController@conclui');

Route::get('atividades/tipos', 'AtividadeController@getTipos');