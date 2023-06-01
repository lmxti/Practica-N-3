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

    public function rules(): array{

        if ($this->isMethod('post')) {
            // Reglas de valicacion para solicitud POST (create)
            return [
                'name' => 'required|string',
                'url' => 'required|string',
                'descripcion' => 'required|string'
            ];
        
        } elseif ($this->isMethod('put')) {
            // Reglas de valicacion para solicitud PUT (update)
            return [
                'name' => 'required|string',
                'url' => 'required|string',
                'descripcion' => 'required|string'
            ];
        }elseif ($this->isMethod('delete')) { 
            // Reglas de valicacion para solicitud DELETE (delete)
            return [
                'id' => 'required|integer'
            ];
        } 
        elseif ($this->isMethod('get')) {
            // Reglas de valicacion para solicitud GET (view)
            return [
                'id' => 'required|integer'
            ];
        } else {
            //Reglas de validacion para cualquier otra solicitud (default)
            return [];
        }

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
