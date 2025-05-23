<?php

namespace App\Http\Requests\User\UserSecurity;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
