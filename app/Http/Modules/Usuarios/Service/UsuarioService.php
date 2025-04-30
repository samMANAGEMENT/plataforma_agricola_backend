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
     * @return bool
     * @author samm <sapinedal@outlook.com>
     * 
     **/ 
    public function register(array $data)
    {

        $data['password'] = Hash::make($data['password']);

        // Crear usuario
        $user = Usuario::create($data);

        return true;
    }


    /**
     * Login de usuario
     *
     * @param array $request
     * @return 
     * @author samm <sapindal@outlook.com>
     */
    public function login(array $request)
    {
        // Buscar usuario
        $user = Usuario::where('email', $request['email'])->first();

        // Verificar existencia y contraseña
        if (!$user || !Hash::check($request['password'], $user->password)) {
            throw new \Exception("Credenciales inválidas.", 1);
        }

        // Crear token
        $tokenResult = $user->createToken('auth_token');

        // Obtener solo el token limpio (sin ID adelante)
        $plainTextToken = explode('|', $tokenResult->plainTextToken)[1];

        // Responder
        return [
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
        ];
    }
}
