<?php

namespace App\Http\Modules\Estados\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Estados\Request\crearEstadoRequest;
use App\Http\Modules\Estados\Services\estadoService;
use Illuminate\Http\Request;

class EstadoController extends Controller
{

    public function __construct(private estadoService $estadoService)
    {
    }

    public function crearEstado(crearEstadoRequest $request)
    {
        try {
            $estado = $this->estadoService->crearEstado($request->validated());
            return response()->json($estado, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }

    public function obtenerEstado()
    {
        try {
            $estado = $this->estadoService->obtenerEstado();
            return response()->json($estado, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }

    public function actualizarEstado(int $id, crearEstadoRequest $data)
    {
        try {
            $estado = $this->estadoService->actualizarEstado($id, $data->validated());
            return response()->json($estado, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }

    public function eliminarEstado(int $id)
    {
        try {
            $estado = $this->estadoService->desactivarEstado($id);
            return response()->json($estado, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }
}
