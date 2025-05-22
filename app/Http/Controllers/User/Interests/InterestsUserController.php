<?php

namespace App\Http\Controllers\User\Interests;

use App\Http\Controllers\Controller;
use App\Models\User;

class InterestsUserController extends Controller
{
    public function index(User $user)
    {
        $interests = $user->interests()->pluck('interest_id');
        return response()->json($interests, 200);
    }
}
