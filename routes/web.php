<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ServicioController;
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
    return view('welcome');
});
//servicios
Route::get('servicios', [ServicioController::class,'index'])->name('servicios.index');
Route::get('servicios/{servicio}', [ServicioController:: class, 'show'])->name('servicios.show');

Route::get('plans/{plan}', [PlanController::class, 'show'])->name('plans.show');


//horarios
Route::get('horarios', [HorarioController::class, 'index'])->name('horarios.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
