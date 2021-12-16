<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user->id, 'id'),
                'email',
            ],
            'apellido' => ['required', 'max:20', 'string'],
            'roles' => 'array',
        ];
    }
}
