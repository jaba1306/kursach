<?php

namespace App\Http\Requests\User\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'location' => 'required|string|max:255',
        ];
    }
}
