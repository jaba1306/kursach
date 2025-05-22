<?php

namespace App\Http\Requests\User\UserProfile;

class UpdateDescriptionRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'description' => 'required|string|max:1000',
        ];
    }
}
