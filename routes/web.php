<?php

use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\EstatuproyectosController;
use App\Http\Controllers\EstatuscitaController;
use App\Http\Controllers\EstatuscotizacionController;
use App\Http\Controllers\EstatuserviciosController;
use App\Http\Controllers\EstatusfacturaController;
use App\Http\Controllers\EstatusordenController;
use App\Http\Controllers\EstatustareaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\TipoproyectosController;
use Illuminate\Support\Facades\Route;



Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');/* 
login */

Route::get('/panel-administrativo', [HomeController::class, 'index'])->name('home');


route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('validar', [LoginController::class, 'validar'])->name('validar');
route::get('inicio', [LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion', [LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena', [LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');
Route::get('cerrarsesion', [LoginController::class, 'cerrarsesion'])->name('cerrarsesion');
/* omar chong */

Route::resource('contactos', ContactosController::class);
Route::get('datatables/contactos', [ContactosController::class, 'RegistrosDatatables'])->name('contactos.datatables');

/* clientes */
Route::resource('clientes', ClientesController::class);
Route::get('datatables/clientes', [ClientesController::class, 'RegistrosDatatables'])->name('clientes.datatables');
Route::post('searchcontacto', [ClientesController::class, 'searchcontacto'])->name('searchcontacto');
Route::post('seleccionarcontacto', [ClientesController::class, 'seleccionarcontacto'])->name('seleccionarcontacto');

Route::get('get-municipios', [ClientesController::class, 'getMunicipios'])->name('getMunicipios');

/* departamentos */
Route::resource('departamentos', DepartamentosController::class);
Route::name('editar')->get('editar/{id}', [DepartamentosController::class, 'edit']);
Route::name('store')->post('store/', [DepartamentosController::class, 'store']);
Route::name('destroy')->delete('destroy/{id}', [DepartamentosController::class, 'destroy']);

/* cotizaciones */

Route::resource('cotizaciones', CotizacionesController::class);
Route::post('buscacliente', [CotizacionesController::class, 'buscacliente'])->name('buscacliente');
Route::post('buscaservicio', [CotizacionesController::class, 'buscaservicio'])->name('buscaservicio');
Route::post('seleccionacliente', [CotizacionesController::class, 'seleccionacliente'])->name('seleccionacliente');
Route::post('seleccionaservicio', [CotizacionesController::class, 'seleccionaservicio'])->name('seleccionaservicio');

Route::get('datatables/cotizaciones', [CotizacionesController::class, 'RegistrosDatatables'])->name('cotizaciones.datatables');

/* usuarios */
Route::resource('usuarios', UsuariosController::class);
Route::get('datatables/usuarios', [UsuariosController::class, 'RegistrosDatatables'])->name('usuarios.datatables');





/* Actividades */
Route::resource('actividades', ActividadesController::class);
Route::post('add-update-actividad', [ActividadesController::class, 'store']);
Route::post('edit-actividad', [ActividadesController::class, 'edit']);
Route::post('delete-actividad/', [ActividadesController::class, 'destroy']);


/* Estatus de servicios */
Route::resource('estatuservicios', EstatuserviciosController::class);
Route::post('add-update-estatuservicio', [EstatuserviciosController::class, 'store']);
Route::post('edit-estatuservicio', [EstatuserviciosController::class, 'edit']);
Route::post('delete-estatuservicio', [EstatuserviciosController::class, 'destroy']);


/* Servicios */
Route::resource('servicios', ServiciosController::class);
Route::post('add-update-servicio', [ServiciosController::class, 'store']);
Route::post('edit-servicio', [ServiciosController::class, 'edit']);
Route::post('delete-servicio', [ServiciosController::class, 'destroy']);

/* Estatus de tareas */
Route::resource('estatutareas', EstatustareaController::class);
Route::post('add-update-estatutarea', [EstatustareaController::class, 'store']);
Route::post('edit-estatutarea', [EstatustareaController::class, 'edit']);
Route::post('delete-estatutarea', [EstatustareaController::class, 'destroy']);


/* Tareas */
Route::resource('tareas', TareasController::class);
Route::get('datatables/tareas', [TareasController::class, 'RegistrosDatatables'])->name('tareas.datatables');

/* Estatus de citas */
Route::resource('estatucitas', EstatuscitaController::class);
Route::post('add-update-estatucita', [EstatuscitaController::class, 'store']);
Route::post('edit-estatucita', [EstatuscitaController::class, 'edit']);
Route::post('delete-estatucita', [EstatuscitaController::class, 'destroy']);

/* Tipos proyectos */
Route::resource('tipoproyectos', TipoproyectosController::class);
Route::post('add-update-tipoproyecto', [TipoproyectosController::class, 'store']);
Route::post('edit-tipoproyecto', [TipoproyectosController::class, 'edit']);
Route::post('delete-tipoproyecto', [TipoproyectosController::class, 'destroy']);

/* Estatu proyectos */
Route::resource('estatuproyectos', EstatuproyectosController::class);
Route::post('add-update-estatuproyecto', [EstatuproyectosController::class, 'store']);
Route::post('edit-estatuproyecto', [EstatuproyectosController::class, 'edit']);
Route::post('delete-estatuproyecto', [EstatuproyectosController::class, 'destroy']);


/* Estatus cotizaciones */
Route::resource('estatucotizacions', EstatuscotizacionController::class);
Route::post('add-update-estatucotizacion', [EstatuscotizacionController::class, 'store']);
Route::post('edit-estatucotizacion', [EstatuscotizacionController::class, 'edit']);
Route::post('delete-estatucotizacion', [EstatuscotizacionController::class, 'destroy']);


/* Estatus orden */
Route::resource('estatuordens', EstatusordenController::class);
Route::post('add-update-estatuorden', [EstatusordenController::class, 'store']);
Route::post('edit-estatuorden', [EstatusordenController::class, 'edit']);
Route::post('delete-estatuorden', [EstatusordenController::class, 'destroy']);


/* Estatus factura */
Route::resource('estatufacturas', EstatusfacturaController::class);
Route::post('add-update-estatufactura', [EstatusfacturaController::class, 'store']);
Route::post('edit-estatufactura', [EstatusfacturaController::class, 'edit']);
Route::post('delete-estatufactura', [EstatusfacturaController::class, 'destroy']);
