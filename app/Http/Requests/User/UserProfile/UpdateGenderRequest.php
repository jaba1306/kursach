<?php

namespace App\Http\Requests\User\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gender' => 'required|in:женский,мужской',
        ];
    }
}
