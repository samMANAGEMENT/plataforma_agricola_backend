<?php

use App\Http\Modules\Empleos\Controllers\EmpleoController;
use Illuminate\Support\Facades\Route;

Route::prefix('empleos')->group(function () {
    // Ruta para crear un nuevo estado
    Route::post('/crear-estado', [EmpleoController::class, 'crearEstado']);

    // Ruta para obtener todos los estado
    Route::get('/obtener-estados', [EmpleoController::class, 'obtenerEstado']);

    // Ruta para actualizar un estado por ID
    Route::put('/actualizar-estado/{id}', [EmpleoController::class, 'actualizarEstado']);

    // Ruta para eliminar un estado por ID
    Route::delete('/eliminar-estado{id}', [EmpleoController::class, 'eliminarEstado']);
});