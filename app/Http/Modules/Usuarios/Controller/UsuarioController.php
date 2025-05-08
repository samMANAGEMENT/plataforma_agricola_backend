<?php

namespace App\Http\Modules\Usuarios\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Usuarios\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Modules\Usuarios\Request\crearUsuarioRequest;
use App\Http\Modules\Usuarios\Request\loguearUsuarioRequest;
use App\Http\Modules\Usuarios\Request\actualizarUsuarioRequest;
use App\Http\Modules\Usuarios\Service\UsuarioService;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

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

    public function listUser()
    {
        try {
            return Usuario::with('tipo')->get();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al listar usuarios.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar usuario
     */
    public function update(actualizarUsuarioRequest $request, $id)
    {
        try {
            $usuario = $this->usuarioService->update($id, $request->validated());
            return response()->json($usuario, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar usuario.',
                'error' => $th->getMessage()
            ], $th->getCode() ?: 500);
        }
    }

    /**
     * Eliminar usuario (borrado lógico)
     */
    public function destroy($id)
    {
        try {
            $this->usuarioService->delete($id);
            return response()->json([
                'message' => 'Usuario desactivado correctamente'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al desactivar usuario.',
                'error' => $th->getMessage()
            ], $th->getCode() ?: 500);
        }
    }
}