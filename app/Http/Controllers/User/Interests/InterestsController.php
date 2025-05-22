<?php

namespace App\Http\Controllers\User\Interests;

use App\Http\Controllers\Controller;
use App\Models\Interest;

class InterestsController extends Controller
{

    public function index()
    {
        return response()->json(Interest::all());
    }
}

