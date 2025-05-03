<?php

namespace App\Http\Modules\Transportes\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransporteRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'orden_id' => 'required',
            'user_id' => 'required',
            'fecha_asignacion' => 'required|date',
            'estado_id' => 'required',
            'costo_transporte' => 'required|numeric|min:0'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
