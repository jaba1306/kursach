<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowUsersController extends Controller
{
    public function __invoke()
    {

        return response()->json(User::all(),200);
    }
}
