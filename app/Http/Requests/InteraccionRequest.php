<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class InteraccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
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
                'idPerroInteresado' => 'required|integer',
                'idPerroCandidato' => 'required|integer',
                'preferencia' => 'required|alpha'
            ];
        } elseif ($this->isMethod('put')) {
            // Reglas de validacion para solicitud PUT (update)
            return [
                'idPerroInteresado' => 'required|integer',
                'idPerroCandidato' => 'required|integer',
                'preferencia' => 'required|alpha'
            ];
        }




    }

    public function messages(){
        return [
            'idPerroInteresado.required' => 'El id del perro interesado es requerido',
            'idPerroInteresado.integer' => 'El id del perro interesado debe ser un numero entero',
            'idPerroCandidato.required' => 'El id del perro candidato es requerido',
            'idPerroCandidato.integer' => 'El id del perro candidato debe ser un numero entero',
            'preferencia.required' => 'La preferencia es requerida',
            'preferencia.alpha' => 'La preferencia debe ser una letra'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "message" => "Error al crear la interaccion",
            "error" => $validator->errors()
        ], Response::HTTP_BAD_REQUEST));
    }
}
