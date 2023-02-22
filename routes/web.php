<?php

use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DispositivosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiciosController;

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

Route::get('/', HomeController::class);


Route::controller(DispositivosController::class)->group(function () {
    Route::get('dispositivos', 'index');
    // Route::get('dispositivos/detalle', 'detalle');
    Route::get('dispositivos/crear', 'crear');
    Route::get('dispositivos/{id}', 'show');
});

Route::controller(ContactosController::class)->group(function () {
    Route::get('contactos', 'index');
    // Route::get('contactos/detalle', 'detalle');
    Route::get('contactos/crear', 'crear');
    Route::get('contactos/{id}', 'show');
    Route::post('contactos', 'save')->name('contactos.save');
});


Route::controller(ServiciosController::class)->group(function () {

    Route::get('servicios/filtrar/{anio}/{mes}', 'filtrarluz');


    Route::get('servicios/luz', 'luz');
    Route::get('servicios/luz/crear', 'newluz');
    Route::get('servicios/agua', 'agua');
    Route::get('servicios/agua/crear', 'newagua');
    Route::get('servicios/internet', 'internet');
    Route::get('servicios/internet/crear', 'newinternet');

    // Route::post('contactos', 'save')->name('contactos.save');
});
