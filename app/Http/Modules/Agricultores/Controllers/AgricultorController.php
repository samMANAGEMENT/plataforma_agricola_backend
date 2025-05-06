<?php

namespace App\Http\Modules\Agricultores\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Agricultores\Services\AgricultorService;
use Illuminate\Http\Request;

class AgricultorController extends Controller
{

    public function __construct(private AgricultorService $agricultorService) 
    {
    }

    public function crearAgricultor(Request $request)
    {
        try {
            $agricultor = $this->agricultorService->crearAgricultor($request->all());
            return response()->json($agricultor, 201);
        } catch (\Throwable $th) {
            return response()->json(['Hubo un problema', $th->getMessage()],500);
        }
    }
}
