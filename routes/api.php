<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\DocumentosController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ExpedientesController;
use App\Http\Controllers\Api\UsersExpedientesController;
use App\Http\Controllers\Api\ExpedientesDocumentosController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('documentos', DocumentosController::class);

        Route::apiResource('users', UsersController::class);

        // User Expedientes
        Route::get('/users/{user}/expedientes', [
            UsersExpedientesController::class,
            'index',
        ])->name('users.expedientes.index');
        Route::post('/users/{user}/expedientes', [
            UsersExpedientesController::class,
            'store',
        ])->name('users.expedientes.store');

        Route::apiResource('expedientes', ExpedientesController::class);

        // Expediente Documentos
        Route::get('/expedientes/{expediente}/documentos', [
            ExpedientesDocumentosController::class,
            'index',
        ])->name('expedientes.documentos.index');
        Route::post('/expedientes/{expediente}/documentos', [
            ExpedientesDocumentosController::class,
            'store',
        ])->name('expedientes.documentos.store');
    });
