<?php

use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\CitasController;
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
use App\Http\Controllers\OrdenpagosController;
use App\Http\Controllers\SeguimientofacturasController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\TipoproyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::get('dash', function() {
    return view('dash');
});


Route::get('/panel-administrativo', [HomeController::class, 'index'])->name('home');
Route::post('/mark-as-read', [HomeController::class, 'markNotification'])->name('markNotification');


route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('validar', [LoginController::class, 'validar'])->name('validar');
route::get('inicio', [LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion', [LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena', [LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');
Route::get('cerrarsesion', [LoginController::class, 'cerrarsesion'])->name('cerrarsesion');
/* omar chong */
Route::resource('contactos', ContactosController::class);
Route::name('destroy_contactos')->delete('destroy_contactos/{id}', [ContactosController::class, 'destroy_contactos']);
/* Route::name('restore')->put('restore/{id}', [ContactosController::class, 'restore']); */
Route::put('contactos/{id}/active-record', [ContactosController::class, 'activeRecord']);
Route::get('datatables/contactos', [ContactosController::class, 'RegistrosDatatables'])->name('contactos.datatables');

/* clientes */
Route::resource('clientes', ClientesController::class);
Route::name('destroy_clientes')->delete('destroy_clientes/{id}', [ClientesController::class, 'destroy_clientes']);
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
Route::name('destroy_cotizaciones')->delete('destroy_cotizaciones/{id}', [CotizacionesController::class, 'destroy_cotizaciones']);
Route::post('buscacliente', [CotizacionesController::class, 'buscacliente'])->name('buscacliente');
Route::post('buscaservicio', [CotizacionesController::class, 'buscaservicio'])->name('buscaservicio');
Route::post('seleccionacliente', [CotizacionesController::class, 'seleccionacliente'])->name('seleccionacliente');
Route::post('seleccionaservicio', [CotizacionesController::class, 'seleccionaservicio'])->name('seleccionaservicio');
Route::get('datatables/cotizaciones', [CotizacionesController::class, 'RegistrosDatatables'])->name('cotizaciones.datatables');
Route::name('coti')->get('coti/{id}', [CotizacionesController::class, 'pdfCoti']);


/* usuarios */
Route::resource('usuarios', UsuariosController::class);
Route::name('destroy_usuarios')->delete('destroy_usuarios/{id}', [UsuariosController::class, 'destroy_usuarios']);
Route::get('datatables/usuarios', [UsuariosController::class, 'RegistrosDatatables'])->name('usuarios.datatables');

Route::post('/mark-as-read', [UsuariosController::class, 'markNotification'])->name('markNotification');
/* Leer notificacion */
/* $sessionusuario = session('sessionusuario');

Route::get('marcarNotificaciones', function(){
    session('sessionusuario')->usuario()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('marcarNotificaciones'); */

/* Actividades */
Route::resource('actividades', ActividadesController::class);
Route::name('store_actividad')->post('store_actividad/', [ActividadesController::class, 'store']);
Route::name('editar-actividad')->get('editar_actividad/{id}', [ActividadesController::class, 'edit']);
Route::name('destroy-actividad')->delete('destroy_actividad/{id}', [ActividadesController::class, 'destroy']);
Route::get('datatables/actividades', [ActividadesController::class, 'RegistrosDatatables'])->name('actividades.datatables');


/* Estatus de servicios */
Route::resource('estatuservicios', EstatuserviciosController::class);
Route::post('add-update-estatuservicio', [EstatuserviciosController::class, 'store']);
Route::post('edit-estatuservicio', [EstatuserviciosController::class, 'edit']);
Route::post('delete-estatuservicio', [EstatuserviciosController::class, 'destroy']);

/* Servicios */
Route::resource('servicios', ServiciosController::class);
Route::name('editar_servicio')->get('editar_servicio/{id}', [ServiciosController::class, 'edit_servicio']);
Route::name('store_servicio')->post('store_servicio/', [ServiciosController::class, 'store_servicio']);
Route::name('destroy_servicio')->delete('destroy_servicio/{id}', [ServiciosController::class, 'destroy_servicio']);

/* Estatus de tareas */
Route::resource('estatutareas', EstatustareaController::class);
Route::name('store_estatutarea')->post('store_estatutarea/', [EstatustareaController::class, 'store']);
Route::name('editar-estatutarea')->get('editar_estatutarea/{id}', [EstatustareaController::class, 'edit']);
Route::name('destroy-estatutarea')->delete('destroy_estatutarea/{id}', [EstatustareaController::class, 'destroy']);

/* Tareas */
Route::resource('tareas', TareasController::class);
Route::get('datatables/tareas', [TareasController::class, 'RegistrosDatatables'])->name('tareas.datatables');
Route::name('destroy_tarea')->delete('destroy_tarea/{id}', [TareasController::class, 'destroy_tarea']);


/* Estatus de citas */
Route::resource('estatucitas', EstatuscitaController::class);
Route::name('store_estatucita')->post('store_estatucita/', [EstatuscitaController::class, 'store']);
Route::name('editar-estatucita')->get('editar_estatucita/{id}', [EstatuscitaController::class, 'edit']);
Route::name('destroy-estatucita')->delete('destroy_estatucita/{id}', [EstatuscitaController::class, 'destroy']);

/* Tipos proyectos */
Route::resource('tipoproyectos', TipoproyectosController::class);
Route::name('store_tipoproyecto')->post('store_tipoproyecto/', [TipoproyectosController::class, 'store']);
Route::name('editar-tipoproyecto')->get('editar_tipoproyecto/{id}', [TipoproyectosController::class, 'edit']);
Route::name('destroy-tipoproyecto')->delete('destroy_tipoproyecto/{id}', [TipoproyectosController::class, 'destroy']);

/* Estatu proyectos */
Route::resource('estatuproyectos', EstatuproyectosController::class);
Route::name('store_estatuproyecto')->post('store_estatuproyecto/', [EstatuproyectosController::class, 'store']);
Route::name('editar-estatuproyecto')->get('editar_estatuproyecto/{id}', [EstatuproyectosController::class, 'edit']);
Route::name('destroy-estatuproyecto')->delete('destroy_estatuproyecto/{id}', [EstatuproyectosController::class, 'destroy']);

/* Estatus cotizaciones */
Route::resource('estatucotizacions', EstatuscotizacionController::class);
Route::name('store_estatucotizacion')->post('store_estatucotizacion/', [EstatuscotizacionController::class, 'store']);
Route::name('editar-estatucotizacion')->get('editar_estatucotizacion/{id}', [EstatuscotizacionController::class, 'edit']);
Route::name('destroy-estatucotizacion')->delete('destroy_estatucotizacion/{id}', [EstatuscotizacionController::class, 'destroy']);

/* Estatus orden */
Route::resource('estatuordens', EstatusordenController::class);
Route::name('store_estatuorden')->post('store_estatuorden/', [EstatusordenController::class, 'store']);
Route::name('editar-estatuorden')->get('editar_estatuorden/{id}', [EstatusordenController::class, 'edit']);
Route::name('destroy-estatuorden')->delete('destroy_estatuorden/{id}', [EstatusordenController::class, 'destroy']);

/* Estatus factura */
Route::resource('estatufacturas', EstatusfacturaController::class);
Route::name('store_estatufactura')->post('store_estatufactura/', [EstatusfacturaController::class, 'store']);
Route::name('editar-estatufactura')->get('editar_estatufactura/{id}', [EstatusfacturaController::class, 'edit']);
Route::name('destroy-estatufactura')->delete('destroy_estatufactura/{id}', [EstatusfacturaController::class, 'destroy']);

/* Citas */
Route::resource('citas', CitasController::class);
Route::name('destroy_cita')->delete('destroy_cita/{id}', [CitasController::class, 'destroy_cita']);
Route::get('datatables/citas', [CitasController::class, 'RegistrosDatatables'])->name('citas.datatables');
Route::post('buscaempresa', [CitasController::class, 'buscaempresa'])->name('buscaempresa');
Route::post('seleccionaempresa', [CitasController::class, 'seleccionaempresa'])->name('seleccionaempresa');
Route::post('buscausuario', [CitasController::class, 'buscausuario'])->name('buscausuario');
Route::post('seleccionausuario', [CitasController::class, 'seleccionausuario'])->name('seleccionausuario');

/* Orden */
Route::resource('ordenpagos', OrdenpagosController::class);
Route::name('destroy_orden')->delete('destroy_orden/{id}', [OrdenpagosController::class, 'destroy_orden']);
Route::get('datatables/ordenpagos', [OrdenpagosController::class, 'RegistrosDatatables'])->name('ordenpagos.datatables');
Route::post('buscacotizacion', [OrdenpagosController::class, 'buscacotizacion'])->name('buscacotizacion');
Route::post('seleccionacotizacion', [OrdenpagosController::class, 'seleccionacotizacion'])->name('seleccionacotizacion');


/* Seguimientofacturas */
Route::resource('seguimientofacturas', SeguimientofacturasController::class);
Route::name('destroy_segf')->delete('destroy_segf/{id}', [SeguimientofacturasController::class, 'destroy_segf']);
Route::get('datatables/seguimientofacturas', [SeguimientofacturasController::class, 'RegistrosDatatables'])->name('seguimientofacturas.datatables');
Route::post('buscaordenpago', [SeguimientofacturasController::class, 'buscaordenpago'])->name('buscaordenpago');
Route::post('seleccionaordenpago', [SeguimientofacturasController::class, 'seleccionaordenpago'])->name('seleccionaordenpago');

