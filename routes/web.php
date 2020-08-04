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

Route::get('evaluacion1','TemplateController@index');

Route::get('principal', 'TemplateController@principal')->name('principal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
