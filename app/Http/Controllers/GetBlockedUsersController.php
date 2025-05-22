<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserBlockList;
use Illuminate\Http\Request;

class GetBlockedUsersController extends Controller
{
    public function __invoke(Request $request)
    {
        $blockedUsers = UserBlockList::with('blockedUser')
            ->where('user_id', auth()->id())
            ->get()
            ->pluck('blockedUser');

        return response()->json($blockedUsers);
    }
}
