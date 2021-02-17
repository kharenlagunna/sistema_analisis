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
    return view('auth.login');
});

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/analisis', [App\Http\Controllers\AnalisisController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/import-form-base', [App\Http\Controllers\BasedeDatosController::class, 'importForm']);
Route::get('/ajax-autocomplete-search', [App\Http\Controllers\BasedeDatosController::class, 'selectSearch']);
Route::post('/import', [App\Http\Controllers\BasedeDatosController::class, 'import'])->name('basededatos.import');

Route::get('/import-form-homologacion', [App\Http\Controllers\TablaHomologacionController::class, 'importForm']);
Route::get('/ajax-autocomplete-search-homologacion', [App\Http\Controllers\TablaHomologacionController::class, 'selectSearch']);
Route::post('/import-homologacion', [App\Http\Controllers\TablaHomologacionController::class, 'import'])->name('tablahomologacion.import');

Route::post('/analisis', [App\Http\Controllers\AnalisisController::class, 'analisis'])->name('analisis');

Route::resource('users', 'App\Http\Controllers\UsuarioController');