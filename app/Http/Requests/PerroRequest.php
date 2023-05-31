<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class PerroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
       
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'url' => 'required|string',
            'descripcion' => 'required|string'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido',
            'url.required' => 'La url es requerida',
            'descripcion.required' => 'La descripcion es requerida'
        ];
     }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "message" => "Error al crear el perro",
            "error" => $validator->errors()
        ], Response::HTTP_BAD_REQUEST));
    }
}
