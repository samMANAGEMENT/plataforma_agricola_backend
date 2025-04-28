<?php

namespace App\Http\Modules\Usuarios\Service;

use Illuminate\Http\Request;
use App\Http\Modules\Usuarios\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    /**
     * Registro de usuario
     *
     * @param Request $request
     * @return array
     * @author samm <sapinedal@outlook.com>
     * 
     **/ 
    public function register($data)
    {
        // Crear usuario
        $user = Usuario::create([
            'nombre' => $data->nombre,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        // Crear token
        $tokenResult = $user->createToken('auth_token');

        $plainTextToken = explode('|', $tokenResult->plainTextToken)[1];

        return [
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
        ];
    }
    /**
     * Login de usuario
     *
     * @param Request $request
     * @return 
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
