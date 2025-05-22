<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'liked_user_id' => 'required|integer|exists:users,id',
        ];
    }
}
