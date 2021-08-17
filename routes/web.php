<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SituacionController;
use App\Http\Controllers\Admin\OperacionController;
use App\Http\Controllers\Admin\DiarioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\PermisosController;
use App\Models\Diario;
use App\Models\Empleado;

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
    $empleados = Empleado::count();
    $diario = Diario::count();
    return view('dashboard', compact('empleados', 'diario'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $empleados = Empleado::count();
    $diario = Diario::count();
    return view('dashboard', compact('empleados', 'diario'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/changelog', function () {
    return view('changelog');
});

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('situaciones', SituacionController::class)->names('admin.situaciones');

Route::resource('operaciones', OperacionController::class)->names('admin.operaciones');

Route::resource('diarios', DiarioController::class)->only(['index'])->names('admin.diarios');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');

Route::resource('permisos', PermisosController::class)->names('admin.permisos');

Route::get('operacion/list', [OperacionController::class, 'getOperaciones'])->name('operacion.list');
Route::get('situacion/list', [SituacionController::class, 'getSituaciones'])->name('situacion.list');
Route::get('permiso/list', [PermisosController::class, 'getPermisos'])->name('permiso.list');
Route::get('role/list', [RoleController::class, 'getRoles'])->name('role.list');
Route::get('usuario/list', [UserController::class, 'getUsuarios'])->name('usuario.list');
Route::get('empleado/list', [EmpleadoController::class, 'getEmpleados'])->name('empleado.list');
Route::get('diario/list', [DiarioController::class, 'getDiarios'])->name('diario.list');

