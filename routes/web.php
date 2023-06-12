<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('proyectos',ProyectoController::class);


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [ProyectoController::class, 'index'])->name('home');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('proyecto',ProyectoController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);