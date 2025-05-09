<?php

use App\Http\Modules\Empleos\Controllers\EmpleoController;
use Illuminate\Support\Facades\Route;

Route::prefix('empleos')->group(function () {
    // Ruta para crear un nuevo empleo
    Route::post('/crear', [EmpleoController::class, 'crearEmpleo']);

    // Ruta para obtener todos los empleos
    Route::get('/obtener-empleos', [EmpleoController::class, 'obtenerEmpleos']);

    // Ruta para obtener un empleo por ID
    Route::get('/obtener-empleo{id}', [EmpleoController::class, 'obtenerEmpleoId']);

    // Ruta para actualizar un empleo por ID
    Route::put('/actualizar-empleo/{id}', [EmpleoController::class, 'actualizarEmpleo']);

    // Ruta para eliminar un empleo por ID
    Route::delete('/eliminar-empleo{id}', [EmpleoController::class, 'eliminarEmpleo']);
});