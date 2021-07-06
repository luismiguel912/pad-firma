<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('signaturepad');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ruta para mostrar la vista de la firma digital
Route::get( 'signaturepad', [App\Http\Controllers\SignaturePadController :: class , 'index' ]);
// ruta para guardar la firma digital
Route::post( 'signaturepad', [App\Http\Controllers\SignaturePadController :: class , 'upload' ])->name( 'signaturepad.upload' );
