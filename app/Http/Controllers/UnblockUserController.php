<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockRequest;

class UnblockUserController extends Controller
{
    public function __invoke(BlockRequest $request)
    {
        $user = auth()->user();
        $blockedUserId = $request->blocked_user_id;

        if (!$user->blockedUsers()->where('blocked_id', $blockedUserId)->exists()) {
            return response()->json(['message' => 'Пользователь не был заблокирован'], 400);
        }

        $user->blockedUsers()->detach($blockedUserId);
        return response()->json(['message' => 'Пользователь разблокирован']);
    }
}
