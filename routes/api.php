<?php

use App\Http\Modules\Usuarios\Controller\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aquí es donde registras las rutas API de tu aplicación.
| Estas rutas están agrupadas bajo el middleware 'api' por defecto.
*/

// Rutas públicas
Route::prefix('auth')->group(function () {
    Route::post('register', [UsuarioController::class, 'register']);
    Route::post('login', [UsuarioController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('ping', function (Request $request) {
        return response()->json(['message' => 'pong', 'user' => $request->user()]);
    });

    // Módulo de empleos
    require __DIR__ . '/empleos/empleos.php';
    // Módulo de estados
    require __DIR__ . '/estados/estados.php';
});
