<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Route::get -> Consultar
| Route::post -> Guardar
| Route::delete -> Eliminar
| Route::put -> Actualizar
|
*/



Route::controller(PageController::class)->group(function () {

    Route::get('/',                                          'home')->name("home");
    Route::get('/dashboard',                                 'dashboard')->middleware(['auth'])->name('dashboard');
    Route::get('/clientes',                                  'clientes')->middleware(['auth'])->name('clientes');
    Route::get('/facturas',                                  'facturas')->middleware(['auth'])->name('facturas');
    Route::get('/nuevocliente',                              'nuevocliente')->middleware(['auth'])->name('nuevocliente');
    Route::post('/guardarcliente',                           'guardarcliente')->middleware(['auth'])->name('guardarcliente');
    Route::get('/editarcliente/{cliente:id}',                'editarcliente')->middleware(['auth'])->name('editarcliente');
    Route::get('/exportarclientesexcel',                     'exportarclientesexcel')->middleware(['auth'])->name('exportarclientesexcel');
    Route::put('/actualizarcliente/{cliente:id}',            'actualizarcliente')->middleware(['auth'])->name('actualizarcliente');
    Route::delete('/eliminarcliente/{cliente:id}',           'eliminarcliente')->middleware(['auth'])->name('eliminarcliente');

    Route::get('/nuevafactura',                              'nuevafactura')->middleware(['auth'])->name('nuevafactura');
    Route::post('/guardarfactura',                           'guardarfactura')->middleware(['auth'])->name('guardarfactura');
    
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';
