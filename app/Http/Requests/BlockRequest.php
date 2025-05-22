<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'blocked_user_id' => [
                'required',
                'integer',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value == auth()->id()) {
                        $fail('Нельзя блокировать самого себя');
                    }
                }
            ],
        ];
    }
}
