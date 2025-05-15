<?php

namespace App\Http\Modules\Productos\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string', 
            'precio_por_kg' => 'required|numeric|min:0',
            'cantidad_disponible' => 'required|integer',
            'fecha_cosecha' => 'required|date',
            'descripcion' => 'nullable|string|max:1000'  
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
