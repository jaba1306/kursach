<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserInterestsRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'interest_ids' => 'required|array',
            'interest_ids.*' => 'integer|exists:interest,id'
        ];
    }
}
