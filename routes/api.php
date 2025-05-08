<?php

use App\Http\Modules\Usuarios\Controller\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UsuarioController::class, 'register']);
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/listUser', [UsuarioController::class, 'listUser']);

// Nuevas rutas para actualizar y eliminar
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/ping', function (Request $request) {
    return 'pong';
});