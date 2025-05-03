<?php

namespace App\Http\Modules\Agricultores\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgricultorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'certificacion_organica' => 'required|boolean',
            'cantidad' => 'required|numeric|min:0',
            'ubicacion_lat' => 'required|numeric|between:-90,90',
            'ubicacion_lon' => 'required|numeric|between:-180,180',
            'tipo_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
