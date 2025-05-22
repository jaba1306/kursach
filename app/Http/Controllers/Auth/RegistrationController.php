<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        $user = User::create($request->validated());

        $data = [
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken
        ];

        return response()->json($data)->setStatusCode(201, 'Created');
    }
}
