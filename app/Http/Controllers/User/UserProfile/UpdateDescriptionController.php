<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateDescriptionRequest;
use App\Models\User;

class UpdateDescriptionController extends Controller
{
    public function __invoke(UpdateDescriptionRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json(['message' => 'Описание успешно обновлено!', 'user' => $user]);
    }
}
