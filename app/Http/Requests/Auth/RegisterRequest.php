<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|min:2',
            'email' => 'required|string',
            'password' => 'required|string|confirmed',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'username' => 'імя користувача',
            'email' => 'електрона адреса',
            'password' => 'пароль',
        ];
    }
}
