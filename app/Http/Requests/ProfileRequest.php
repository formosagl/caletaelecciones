<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Debes ingresar tu nombre.',
            'name.min'          => 'Tu nombre debe tener minimo 3 caracteres',
            'email.required'    => 'Debes ingresar tu email.',
            'email.email'       => 'Formato de email no válido.'
        ];
    }
}
