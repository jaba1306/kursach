<?php

namespace App\Http\Controllers;

use App\Services\MatchService;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected MatchService $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    // Получение списка мэтчей текущего пользователя
    public function index()
    {
        $matches = $this->matchService->getUserMatches(auth()->id());

        return response()->json([
            'success' => true,
            'matches' => $matches
        ]);
    }

}
