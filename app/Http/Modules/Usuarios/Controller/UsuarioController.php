<?php

namespace App\Http\Modules\Usuarios\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Modules\Usuarios\Models\Usuario;
use App\Http\Modules\Usuarios\Request\crearUsuarioRequest;
use App\Http\Modules\Usuarios\Request\loguearUsuarioRequest;
use App\Http\Modules\Usuarios\Service\UsuarioService;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    /**
     * Constructor
     *
     * @author samm <sapinedal@outlook.com>
     * 
     **/

    public function __construct(private UsuarioService $usuarioService)
    {
    }

    /**
     * Registro de usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author samm <sapinedal@outlook.com>
     * 
     **/ 
    public function register(crearUsuarioRequest $request)
    {
        try {
            $usuario = $this->usuarioService->register($request->validated());
            return response()->json($usuario, 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al registrar el usuario.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login de usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author samm <sapindal@outlook.com>
     */

    public function login(loguearUsuarioRequest $request)
    {
        try {
            $usuario = $this->usuarioService->login($request->validated());
            return response()->json($usuario, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al loguear el usuario.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
