<?php

namespace App\Http\Modules\Usuarios\Request;

use Illuminate\Foundation\Http\FormRequest;

class actualizarUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mapea el campo 'dni' del frontend al campo 'documento' esperado en el backend.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('dni')) {
            $this->merge([
                'documento' => $this->input('dni'),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'nombre'     => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'telefono'   => 'nullable|string|max:20',
            'documento'  => 'required|string|max:30', // Este es el campo que ahora será llenado con 'dni'
            'direccion'  => 'nullable|string|max:255',
            'tipo_id'    => 'nullable|integer|exists:tipos,id',
            'estado'     => 'nullable|boolean',
            'password'   => 'nullable|string|min:6|confirmed',
        ];
    }
}
