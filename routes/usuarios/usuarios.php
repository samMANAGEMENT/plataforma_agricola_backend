<?php

use Illuminate\Support\Facades\Route;
use App\Http\Modules\Usuarios\Controller\UsuarioController;

Route::prefix('usuarios')->group(function () {
    Route::get('/listUser', [UsuarioController::class, 'listUser']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});
