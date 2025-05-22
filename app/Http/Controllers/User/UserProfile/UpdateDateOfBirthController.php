<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateDateOfBirthRequest;
use App\Models\User;

class UpdateDateOfBirthController extends Controller
{
    public function __invoke(UpdateDateOfBirthRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json(['message' => 'Дата рождения успешно обновлена!', 'user' => $user]);
    }
}
