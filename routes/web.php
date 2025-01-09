<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisoControl;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth'])->group(function(){ 
  Route::get('/Home', [HomeController::class,'index'])->name('home');
  Route::post('/perfil/foto', 'ProfileController@updatePhoto');
  Route::get('personal/getimagen', [ProfileController::class,'getimagen'])->name('personal.getimagen');
  Route::resource('usuario', UserController::class);
  Route::resource('role', RoleController::class);  
  Route::resource('permiso', PermisoController::class);


});


