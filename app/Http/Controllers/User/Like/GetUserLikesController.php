<?php

namespace App\Http\Controllers\User\Like;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserLikesController extends Controller
{
    public function __invoke()
    {
        $likes = auth()->user()->likesFromUsers()->get();
        return response()->json($likes);
    }
}
