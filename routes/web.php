<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;






Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::get('/panel-administrativo', [HomeController::class,'index'])->name('home');
route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('validar',[LoginController::class, 'validar'])->name('validar');
route::get('inicio',[LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion',[LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena',[LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');
Route::resource('clientes', ClientesController::class);
/* omar chong */
Route::resource('contactos', ContactosController::class);
Route::post('add-update-contacto', [ContactosController::class,'store']);
Route::post('edit-contacto',[ContactosController::class,'edit']);
Route::post('delete-contactos',[ContactosController::class,'destroy']);
Route::get('datatables/contactos', [ContactosController::class, 'RegistrosDatatables'])->name('contactos.datatables');

/* cristhian */
Route::resource('servicios', ServiciosController::class);
Route::post('add-update-servicio', [ServiciosController::class, 'store']);
Route::post('edit-servicio', [ServiciosController::class, 'edit']);
Route::post('delete-servicio', [ServiciosController::class, 'destroy']);
Route::get('datatables/servicios', [ServiciosController::class, 'RegistrosDatatables'])->name('servicios.datatables');


