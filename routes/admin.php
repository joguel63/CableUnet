<?php

use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ContratoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HorarioController;
use App\Http\Controllers\Admin\PaqueteController;
use App\Http\Controllers\Admin\Plancontroller;
use App\Http\Controllers\Admin\ProgramaController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\ServicioController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
//users
Route::resource('users', UserController::class)->names('admin.users');
//contratos
Route::resource('contratos', ContratoController::class)->names('admin.contratos');
//solicitudes
Route::resource('requests', RequestController::class)->names('admin.requests');
//servicios
Route::resource('servicios', ServicioController::class)->names('admin.servicios');
//planes
Route::resource('plans', Plancontroller::class)->names('admin.plans');
//paquetes
Route::resource('paquetes', PaqueteController::class)->names('admin.paquetes');
//canales
Route::resource('channels', ChannelController::class)->names('admin.channels');
//programas
Route::resource('programas', ProgramaController::class)->names('admin.programas');
//horarios
Route::get('horarios/create/{channel_id}', [HorarioController::class, 'create'])->middleware('can:admin.horarios.create')->name('admin.horarios.create');
Route::get('horarios/{channel_id}/{fecha}/edit',[HorarioController::class, 'edit'] )->middleware('can:admin.horarios.edit')->name('admin.horarios.edit');
Route::get('horarios/{channel_id}/{fecha}', [HorarioController::class, 'index'])->middleware('can:admin.horarios.index')->name('admin.horarios.index');
Route::put('horarios/',[HorarioController::class, 'update'])->middleware('can:admin.horarios.edit')->name('admin.horarios.update');
Route::post('horarios/', [HorarioController::class, 'store'])->middleware('can:admin.horarios.create')->name('admin.horarios.store');
