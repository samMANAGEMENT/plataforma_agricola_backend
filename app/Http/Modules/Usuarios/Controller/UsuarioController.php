<?php

namespace App\Http\Modules\Usuarios\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Modules\Usuarios\Models\Usuario;
use App\Http\Modules\Usuarios\Request\crearUsuarioRequest;
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
            $usuario = $this->usuarioService->register($request);
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

    public function login(Request $request)
    {
        // Validar inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar usuario
        $user = Usuario::where('email', $request->email)->first();

        // Verificar existencia y contraseña
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas.'], 401);
        }

        // Crear token
        $tokenResult = $user->createToken('auth_token');

        // Obtener solo el token limpio (sin ID adelante)
        $plainTextToken = explode('|', $tokenResult->plainTextToken)[1];

        // Responder
        return response()->json([
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}
