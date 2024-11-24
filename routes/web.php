<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\VeiculosController;
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


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
#Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/crud', [VeiculosController::class, 'index'])->name('crud')->middleware('auth');;

Route::get('/crud/new', [VeiculosController::class, "index"])->name('new')->middleware('auth');;

Route::post('/crud', [VeiculosController::class, "save"])->name('save')->middleware('auth');;

Route::get('/crud/{veiculos}', [VeiculosController::class, "edit"])->name('edit')->middleware('auth');;

Route::get('/crud/delete/{veiculos}', [VeiculosController::class, "delete"])->name('delete')->middleware('auth');;

Route::put('/crud/{veiculos}', [VeiculosController::class, "update"])->name('update')->middleware('auth');;



Route::get('/', [HomePageController::class,"index"])->name('home_page');