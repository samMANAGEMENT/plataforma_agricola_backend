<?php

namespace App\Http\Modules\Empleos\Services;

use App\Http\Modules\Empleos\Models\Empleos;

class EmpleoService
{
    public function crearEmpleo(array $data)
    {
        return Empleos::create($data);
    }

    public function obtenerEmpleos()
    {
        return Empleos::paginate(10);
    }

    public function actualizarEmpleo($id)
    {
        $empleo = Empleos::find($id)->frist();

        return Empleos::update($empleo);
    }

    public function eliminarEmpleo($id)
    {
        return Empleos::find($id)->delete();
    }
}
