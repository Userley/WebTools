<?php

use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DispositivosController;
use App\Http\Controllers\FrasesController;
use App\Http\Controllers\GastosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\ServicioAguaController;
use App\Http\Controllers\ServicioGasController;
use App\Http\Controllers\ServicioInternetController;
use App\Http\Controllers\ServicioLuzController;
use App\Http\Controllers\ServicioOtrosController;
use App\Http\Controllers\ServicioResumenController;
use App\Http\Controllers\VideosController;
use App\Mail\InfoMailMailable;
use Illuminate\Support\Facades\Mail;
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
    Route::get('dispositivos', 'index')->name('dispositivos');
    Route::get('dispositivos/crear', 'crear');
    Route::get('dispositivos/{id}', 'show');
    Route::post('dispositivos', 'registrar')->name('dispositivo.save');
});

Route::controller(ContactosController::class)->group(function () {
    Route::get('contactos', 'index');
    Route::get('contactos/crear', 'crear');
    Route::get('contactos/{id}', 'show');
    Route::post('contactos', 'save')->name('contactos.save');
});


Route::controller(ServicioLuzController::class)->group(function () {
    Route::get('servicios/luz', 'luz')->name('servicios.luz');
    Route::get('servicios/filtrar', 'filtrarluz')->name('servicios.filtrar');
    Route::get('servicios/luz/crear', 'newluz');
    Route::post('servicios/luz', 'saveluz')->name('servicios.saveluz');
    Route::post('servicios/luz/eliminar', 'eliminarLuz')->name('servicios.eliminarluz');
});

Route::controller(ServicioAguaController::class)->group(function () {
    Route::get('servicios/agua', 'agua')->name('servicios.agua');
    Route::get('servicios/filtraragua', 'filtraragua')->name('servicios.filtraragua');
    Route::get('servicios/agua/crear', 'newagua');
    Route::post('servicios/agua', 'saveagua')->name('servicios.saveagua');
    Route::post('servicios/agua/eliminar', 'eliminaragua')->name('servicios.eliminaragua');
});

Route::controller(ServicioInternetController::class)->group(function () {
    Route::get('servicios/internet', 'internet')->name('servicios.internet');
    Route::get('servicios/filtrarinternet', 'filtrarinternet')->name('servicios.filtrarinternet');
    Route::get('servicios/internet/crear', 'newinternet');
    Route::post('servicios/internet', 'saveinternet')->name('servicios.saveinternet');
    Route::post('servicios/internet/eliminar', 'eliminarinternet')->name('servicios.eliminarinternet');
});

Route::controller(ServicioGasController::class)->group(function () {
    Route::get('servicios/gas', 'gas')->name('servicios.gas');
    Route::get('servicios/filtrargas', 'filtrargas')->name('servicios.filtrargas');
    Route::get('servicios/gas/crear', 'newgas');
});

Route::controller(ServicioOtrosController::class)->group(function () {
    Route::get('servicios/otros', 'otros')->name('servicios.otros');
    Route::get('servicios/filtrarotros', 'filtrarotros')->name('servicios.filtrarotros');
    Route::get('servicios/otros/crear', 'newotros');
});

Route::controller(ServicioResumenController::class)->group(function () {
    Route::get('servicios/resumen', 'resumen')->name('servicios.resumen');
    Route::get('servicios/filtrarresluz', 'filtrarresluz')->name('servicios.filtrarresluz');
    Route::get('servicios/filtrarresagua', 'filtrarresagua')->name('servicios.filtrarresagua');
    Route::get('servicios/filtrarresinternet', 'filtrarresinternet')->name('servicios.filtrarresinternet');
});

Route::controller(VideosController::class)->group(function () {
    Route::get('memorias/videos', 'videos')->name('memorias.videos');
    Route::get('memorias/videos/crear', 'newvideos');
});

Route::controller(ImagenesController::class)->group(function () {
    Route::get('memorias/imagenes', 'imagenes')->name('memorias.imagenes');
    Route::get('memorias/imagenes/crear', 'newimagenes');
    Route::post('memorias/imagenes/saveimagenes', 'saveimagenes')->name('memorias.saveimagenes');
    Route::get('memorias/imagenes/filtrarimagenes', 'filtrarimagenes')->name('memorias.filtrarimagenes');
    Route::post('memorias/imagenes/removeimagen', 'removeimagen')->name('memorias.removeimagen');
});

Route::controller(FrasesController::class)->group(function () {
    Route::get('memorias/frases', 'frases')->name('memorias.frases');
    Route::get('memorias/frases/crear', 'newfrases');
});

Route::controller(GastosController::class)->group(function () {
    Route::get('gastos', 'gastos')->name('gastos');
    // Route::get('memorias/frases/crear', 'newfrases');
});




Route::get('email/infomail/{mes}/{anio}', function ($mes, $anio) {
    $correo = new InfoMailMailable($mes, $anio);
    Mail::to('iris_diaz@hotmail.com')->send($correo);
    return "Correo enviado";
});
