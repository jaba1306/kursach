<?php

namespace App\Http\Requests\User\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateOfBirthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date_of_birth' => 'required|date',
        ];
    }
}
