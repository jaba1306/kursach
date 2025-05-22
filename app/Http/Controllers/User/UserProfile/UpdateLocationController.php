<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateLocationRequest;
use App\Models\User;

class UpdateLocationController extends Controller
{
    public function __invoke(UpdateLocationRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json(['message' => 'Локация успешно обновлена!', 'user' => $user]);
    }
}
