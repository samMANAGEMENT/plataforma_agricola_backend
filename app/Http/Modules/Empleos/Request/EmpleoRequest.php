<?php

namespace App\Http\Modules\Empleos\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmpleoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'tipo_trabajo' => 'required|string|max:1000',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'pago_por_dia' => 'required|numeric|min:0',
            'estado_id' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
