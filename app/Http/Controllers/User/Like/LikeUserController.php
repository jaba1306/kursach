<?php

namespace App\Http\Controllers\User\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeUserRequest;
use App\Models\UserLiked;



class LikeUserController extends Controller
{
    public function __invoke(LikeUserRequest $request)
    {
        $user = auth()->user();
        $likedUserId = $request->liked_user_id;

        if ($user->likedUsers()->where('liked_user_id', $likedUserId)->exists()) {
            return response()->json(['message' => 'Вы уже поставили лайк этому пользователю'], 400);
        }

        $user->likedUsers()->attach($likedUserId);

        $isMatch = UserLiked::where('user_id', $likedUserId)
            ->where('liked_user_id', $user->id)
            ->exists();

        return response()->json([
            'message' => 'Лайк поставлен',
            'is_match' => $isMatch
        ], 200);
    }
}
