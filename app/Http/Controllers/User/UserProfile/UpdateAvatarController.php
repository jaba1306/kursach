<?php

namespace App\Http\Controllers\User\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfile\UpdateAvatarRequest;
use App\Models\User;

class UpdateAvatarController extends Controller
{
    public function __invoke(UpdateAvatarRequest $request, User $user)
    {
        $path = $request->file('avatar')->store('public/avatars');
        $url = asset('storage/avatars/' . basename($path));
        $user->update(['avatar' => $url]);

        return response()->json(['message' => 'Аватар успешно обновлен!', 'user' => $user, 'avatar_url' => $url]);
    }
}
