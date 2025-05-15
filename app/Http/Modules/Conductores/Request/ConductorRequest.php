<?php

namespace App\Http\Modules\Conductores\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConductorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'licencia' => 'required|string|max:50|unique:conductores,licencia',
            'tipo_vehiculo' => 'required|string|max:1000',
            'capacidad_kg' => 'required|numeric|min:0',
            'placa_vehiculo' => 'required|string|max:20|unique:conductores,placa_vehiculo',
            'tipo_id' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
