<?php

namespace App\Http\Requests\User\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar' => 'required|image|max:2048', // 2MB
        ];
    }
}
