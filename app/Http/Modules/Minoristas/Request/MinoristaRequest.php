<?php

namespace App\Http\Modules\Minoristas\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MinoristaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo_negocio' => 'required|string|max:1000',
            'rut' => 'required|string|max:255|unique:minoristas,rut',
            'nombre_negocio' => 'required|string|max:255',
            'tipo_id' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
