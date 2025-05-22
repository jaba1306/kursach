<?php

namespace App\Http\Controllers\User\Interests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\User;

class RemoveUserInterestsController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $interest_id = $request->input('id_interest');

        // Открепляем интерес по interest_id
        $user->interests()->detach($interest_id);

        return response()->json([
            'message' => 'Interest successfully removed',
            'data' => [
                'user_id' => $user->id,
                'removed_interest_id' => $interest_id,
                'remaining_interests' => $user->interests()->pluck('interest_id')
            ]
        ], 200); // статус-код 200
    }
}
