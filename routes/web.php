<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register'=>false,'reset'=>false]);


Route::get('/home', 'PrestamoController@index')->name('home');

Route::resource('libros', 'LibrosController')->middleware('auth');
//Recursos para se generen las rutas necesarias de autores y solo sean accesibles si ya se paso el middleware
Route::resource('autores', 'AutoresController')->middleware('auth');

//Recursos para se generen las rutas necesarias de categorias y solo sean accesibles si ya se paso el middleware
Route::resource('ctegorias', 'CtegoriasController')->middleware('auth');

//Recursos para se generen las rutas necesarias de editoriales y solo sean accesibles si ya se paso el middleware
Route::resource('editorial', 'EditorialController')->middleware('auth');

//Recursos para se generen las rutas necesarias de prestamos y solo sean accesibles si ya se paso el middleware
Route::resource('prestamo', 'PrestamoController')->middleware('auth');
//Recursos para se generen las rutas necesarias de usuarios y solo sean accesibles si ya se paso el middleware
Route::resource('usuario', 'UsuarioController')->middleware('auth');
//Recursos para se generen las rutas necesarias de libros y solo sean accesibles si ya se paso el middleware
Route::resource('libros', 'LibrosController')->middleware('auth');

Route::get('/prueba', 'reporteController@PDFprestamo')->name('descargarpdf');
azsbgd