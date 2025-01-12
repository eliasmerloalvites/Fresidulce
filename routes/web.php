<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultaDocumentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisoControl;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'inicio'])->name('inicio');
Route::get('/logueo', [UserController::class,'showlogin'])->name('login');
Route::post('/identificacion', [UserController::class,'verificarlogin'])->name('identificacion');
Route::get('/cancelarusuario',function(){
    return redirect()->route('usuario.index')->with('datos','Acción Cancelada...!');
  })->name('usuario.cancelar');
Route::post('/salir', [UserController::class,'salir'])->name('logout');

Route::get('/consulta', [ConsultaDocumentoController::class,'index'])->name('consulta');
Route::get('/consultardni/{id}', [ConsultaDocumentoController::class,'buscarDni'] )->name('consultar.reniec');
Route::get('/consultasunat', [ConsultaDocumentoController::class,'indexsunsat'] )->name('consultarsunat');
Route::get('/consultarruc/{id}', [ConsultaDocumentoController::class,'buscarRuc'] )->name('consultar.sunat');


Route::middleware(['auth'])->group(function(){ 
  Route::get('/home', [HomeController::class,'index'])->name('home');
  //Route::post('/perfil/foto', 'ProfileController@updatePhoto');
  Route::get('personal/getimagen', [ProfileController::class,'getimagen'])->name('personal.getimagen');
  Route::resource('usuario', UserController::class);
  Route::resource('role', RoleController::class);  
  Route::resource('permiso', PermisoController::class);
  Route::resource('clase',ClaseController::class);
  
  Route::resource('categoria', CategoriaController::class);
  
  Route::resource('producto',ProductoController::class);
  Route::resource('gestion/cliente',ClienteController::class)->names([
    'index' => 'gestion.cliente.index',
    'create' => 'gestion.cliente.create',
    'store' => 'gestion.cliente.store',
    'edit' => 'gestion.cliente.edit',
    'update' => 'gestion.cliente.update',
    'destroy' => 'gestion.cliente.destroy',
    'show' => 'gestion.cliente.show'
  ]);
  Route::resource('gestion/venta',VentaController::class)->names([
    'index' => 'gestion.venta.index',
    'create' => 'gestion.venta.create',
    'store' => 'gestion.venta.store',
    'edit' => 'gestion.venta.edit',
    'update' => 'gestion.venta.update',
    'show' => 'gestion.venta.show'
  ]);


});

