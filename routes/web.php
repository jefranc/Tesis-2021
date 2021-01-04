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

Route::get('/', function () {
    return view('auth/login');
});

//Route::get('evaluacion1','TemplateController@index');

//Route::get('principal', 'TemplateController@principal')->name('principal');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/principal', 'TemplateController@index')->name('principal');
    Route::get('/evaluacion1','Evaluacion1Controller@index')->name('evaluacion1');
    Route::get('/evaluacion2','Evaluacion2Controller@index')->name('evaluacion2');
    Route::get('/editar_perfil','Editar_PerfilController@index')->name('editar_perfil');
    Route::get('/coevaluacion_lista','Coevaluacion_ListaController@index')->name('coevaluacion_lista');



});