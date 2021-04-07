<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SituacionController;
use App\Http\Controllers\Admin\OperacionController;
use App\Http\Controllers\Admin\DiarioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\PermisosController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('situaciones', SituacionController::class)->names('admin.situaciones');

Route::resource('operaciones', OperacionController::class)->names('admin.operaciones');

Route::resource('diarios', DiarioController::class)->only(['index'])->names('admin.diarios');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');

Route::resource('permisos', PermisosController::class)->names('admin.permisos');
