<?php

namespace App\Http\Modules\Usuarios\Service;

use App\Http\Modules\Usuarios\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    /**
     * Registro de usuario
     *
     * @param array $data
     * @return bool
     * @author samm <sapinedal@outlook.com>
     */
    public function register(array $data): bool
    {
        $data['password'] = Hash::make($data['password']);
        Usuario::create($data);
        return true;
    }

    /**
     * Login de usuario
     *
     * @param array $credentials
     * @return array
     * @throws \Exception
     * @author samm <sapindal@outlook.com>
     */
    public function login(array $credentials): array
    {
        $user = Usuario::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new \Exception("Credenciales inválidas.", 1);
        }

        $tokenResult = $user->createToken('auth_token');
        $plainTextToken = explode('|', $tokenResult->plainTextToken)[1];

        return [
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
        ];
    }

    /**
     * Obtener todos los usuarios con su tipo.
     *
     * @return Collection<Usuario>
     */
    public function getAllUsersWithTipo(): Collection
    {
        return Usuario::with('tipo')->get();
    }

    /**
     * Actualizar usuario existente
     *
     * @param int $id
     * @param array $data
     * @return Usuario
     * @throws \Exception
     */
    public function update(int $id, array $data): Usuario
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            throw new \Exception("Usuario no encontrado", 404);
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $usuario->update($data);
        return $usuario;
    }

    /**
     * Borrado lógico de usuario
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            throw new \Exception("Usuario no encontrado", 404);
        }

        // Borrado lógico (actualizar estado a false/inactivo)
        $usuario->update(['estado' => false]);
        return true;
    }
}