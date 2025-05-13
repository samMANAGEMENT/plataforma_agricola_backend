<?php

use App\Http\Modules\Usuarios\Controller\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UsuarioController::class, 'register']);
Route::post('/login', [UsuarioController::class, 'login']);




Route::middleware('auth:sanctum')->group(function () {
    Route::get('ping', function (Request $request) {
        return response()->json(['message' => 'pong', 'user' => $request->user()]);
    });

    // Módulo de empleos
    require __DIR__ . '/empleos/empleos.php';
    // Módulo de estados
    require __DIR__ . '/estados/estados.php';

    // mudolo listar usurios
    require __DIR__ . '/usuarios/usuarios.php';
    
    
});