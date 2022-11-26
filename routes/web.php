<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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
/* For get login page*/


Route::group(['middleware'=>['guest']],function(){
    Route::get('/login', function () {return view('auth.login');});
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
});
Route::group(['middleware'=>['auth']],function(){
    // Route::get('/logout',['App\Http\Controllers\Auth\LoginController@logout'])->name('logout');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {return view('principal');});
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware'=>['Comprador']],function(){
        Route::resource('categoria',CategoriaController::class);
        Route::resource('producto',ProductoController::class);
        Route::resource('proveedor',ProveedorController::class);
    });
    Route::group(['middleware'=>['Vendedor']],function(){
        Route::resource('categoria',CategoriaController::class);
        Route::resource('producto',ProductoController::class);
        Route::resource('cliente',ClienteController::class);
    });
    Route::group(['middleware'=>['Administrador']],function(){
        Route::resource('categoria',CategoriaController::class);
        Route::resource('producto',ProductoController::class);
        Route::resource('proveedor',ProveedorController::class);
        Route::resource('cliente',ClienteController::class);
        Route::resource('rol',RolController::class);
        Route::resource('user',UserController::class);
    });
    
});





