<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateGenderRequest;
use App\Models\User;

class UpdateGenderController extends Controller
{
    public function __invoke(UpdateGenderRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json(['message' => 'Пол успешно обновлен!', 'user' => $user]);
    }
}
