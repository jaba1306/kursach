<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateUsernameRequest;
use App\Models\User;

class UpdateUsernameController extends Controller
{
    public function __invoke(UpdateUsernameRequest $request, User $user): \Illuminate\Http\JsonResponse
    {
        $user->update($request->validated());
        return response()->json(['message' => 'Имя пользователя успешно обновлено!', 'user' => $user]);
    }
}
