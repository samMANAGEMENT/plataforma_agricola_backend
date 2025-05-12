<?php

namespace App\Http\Modules\Empleos\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class crearEmpleoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'tipo_trabajo' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'pago_por_dia' => 'required',
            'estado_id' => 'required|integer'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}