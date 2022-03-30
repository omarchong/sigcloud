<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\EstatustareaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TareasController;
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
Route::get('cerrarsesion', [LoginController::class, 'cerrarsesion'])->name('cerrarsesion');

/* omar chong */
Route::resource('contactos', ContactosController::class);
Route::post('add-update-contactos', [ContactosController::class, 'store']);
Route::post('edit-contacto',[ContactosController::class,'edit']);
Route::post('delete-contactos',[ContactosController::class,'destroy']);
Route::get('datatables/contactos', [ContactosController::class, 'RegistrosDatatables'])->name('contactos.datatables');
/* clientes */
Route::resource('clientes', ClientesController::class);
Route::get('datatables/clientes', [ClientesController::class, 'RegistrosDatatables'])->name('clientes.datatables');
Route::post('searchcontacto', [ClientesController::class, 'searchcontacto'])->name('searchcontacto');
Route::get('get-municipios',[ClientesController::class, 'getMunicipios'])->name('getMunicipios');


/* usuarios */
Route::resource('usuarios', UsuariosController::class);
Route::get('datatables/usuarios',[UsuariosController::class, 'RegistrosDatatables'])->name('usuarios.datatables');




/* cristhian */
Route::resource('servicios', ServiciosController::class);
Route::post('add-update-servicio', [ServiciosController::class, 'store']);
Route::post('edit-servicio', [ServiciosController::class, 'edit']);
Route::post('delete-servicio', [ServiciosController::class, 'destroy']);
Route::get('datatables/servicios', [ServiciosController::class, 'RegistrosDatatables'])->name('servicios.datatables');

/* cristhian */
Route::resource('tareas', TareasController::class);
Route::post('add-update-tarea', [TareasController::class, 'store']);
Route::post('edit-tarea', [TareasController::class, 'edit']);
Route::post('delete-tarea', [TareasController::class, 'destroy']);
Route::get('datatables/tareas', [TareasController::class, 'RegistrosDatatables'])->name('tareas.datatables');

/* cristhian */
Route::resource('estatutareas', EstatustareaController::class);
Route::post('add-update-estatutarea', [EstatustareaController::class, 'store']);
Route::post('edit-estatutarea', [EstatustareaController::class, 'edit']);
Route::post('delete-estatutarea', [EstatustareaController::class, 'destroy']);
Route::get('datatables/estatutareas', [EstatustareaController::class, 'RegistrosDatatables'])->name('estatutareas.datatables');



