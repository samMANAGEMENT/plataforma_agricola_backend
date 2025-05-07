<?php

namespace App\Http\Modules\Empleos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Empleos\Request\crearEmpleoRequest;
use App\Http\Modules\Empleos\Services\EmpleoService;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{

    public function __construct(private EmpleoService $empleoService) {}

    public function crearEmpleo(crearEmpleoRequest $request)
    {
        try {
            $empleo = $this->empleoService->crearEmpleo($request->validated());
            return response()->json($empleo, 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function obtenerEmpleos()
    {
        try {
            $empleo = $this->empleoService->obtenerEmpleos();
            return response()->json($empleo, 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function actualizarEmpleo($id)
    {
        try {
            $empleo = $this->empleoService->actualizarEmpleo($id);
            return response()->json($empleo, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }

    public function eliminarEmpleo($id)
    {
        try {
            $empleo = $this->empleoService->eliminarEmpleo($id);
            return response()->json($empleo, 200);
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()], 500);
        }
    }
}
