<?php

namespace App\Http\Modules\Estados\Services;

use App\Http\Modules\Estados\Models\Estados;

class estadoService
{
    // Aquí va tu magia del servicio 🪄

    public function crearEstado(array $data)
    {
        return Estados::create($data);
    }

    public function obtenerEstado()
    {
        return Estados::get();
    }

    public function actualizarEstado(int $id, array $data)
    {
        return Estados::findOrFail($id)->update($data);
    }

    public function desactivarEstado($id)
    {
        return Estados::findOrFail($id)->delete();
    }
}
