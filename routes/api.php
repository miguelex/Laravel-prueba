<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::apiResource('empleados', App\Http\Controllers\Api\EmpleadoController::class);

Route::apiResource('caras', App\Http\Controllers\Api\CaraController::class);

Route::apiResource('modelos', App\Http\Controllers\Api\ModeloController::class);
