<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoStoreRequest extends FormRequest
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
            'path' => ['required', 'max:255', 'string'],
            'tipo' => ['required', 'max:50', 'string'],
            'expediente_id' => ['required', 'exists:expedientes,id'],
        ];
    }
}
