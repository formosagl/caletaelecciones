<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
            'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:6'],
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => __('current password'),
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'     => 'Debes ingresar tu clave actual',
            'old_password.min'          => 'La clave actual debe tener minimo 6 caracteres',
            'password.required'         => 'Debes ingresar tu nueva clave.',
            'password.min'              => 'La nueva clave debe tener minimo 6 caracteres',
            'password.confirmed'        => 'La clave y la confirmación no coinciden',
            'password.different'        => 'La nueva clave no puede ser igual a la actual',
            'password_confirmation:required' => 'Debes ingresar la confirmación de la clave',
            'password_confirmation:min'      => 'La confirmación de la clave debe tener minimo 6 caracteres'
        ];
    }
}
