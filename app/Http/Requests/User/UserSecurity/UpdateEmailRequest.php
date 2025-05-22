<?php

namespace App\Http\Requests\User\UserSecurity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ];
    }
}
