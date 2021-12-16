<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'max:50', 'string'],
            'apellido' => ['required', 'max:50', 'string'],
            'curp' => ['required', 'max:20', 'string'],
            'ine' => ['required', 'max:20', 'string'],
            'domicilio' => ['required', 'max:255', 'string'],
            'documento' => ['required', 'max:50', 'string'],
            'beneficiario' => ['required', 'max:100', 'string'],
            'clabe' => ['required', 'max:15', 'string'],
            'tipo' => ['required', 'in:plantas,hectareas'],
            'total' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
