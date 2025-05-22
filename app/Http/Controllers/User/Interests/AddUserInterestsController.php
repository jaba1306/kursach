<?php

namespace App\Http\Controllers\User\Interests;

use App\Http\Controllers\Controller;

use App\Http\Requests\AddUserInterestsRequest;
use App\Models\Interest;
use App\Models\User;

class AddUserInterestsController extends Controller
{
    public function __invoke(AddUserInterestsRequest $request, User $user)
    {
        $interestIds = $request->input('interest_ids', []);

        // Проверяем существование интересов
        $existingInterests = Interest::whereIn('id', $interestIds)->pluck('id')->toArray();
        $nonExisting = array_diff($interestIds, $existingInterests);

        if (!empty($nonExisting)) {
            return response()->json([
                'message' => 'Some interests not found',
                'invalid_ids' => $nonExisting
            ], 422);
        }

        // Получаем текущие интересы пользователя
        $currentInterests = $user->interests()->pluck('interest_id')->toArray();

        // Объединяем старые и новые интересы, удаляя дубликаты
        $allInterests = array_unique(array_merge($currentInterests, $interestIds));

        // Синхронизируем все интересы
        $user->interests()->sync($allInterests);

        // Определяем, какие интересы были добавлены
        $newlyAttached = array_diff($interestIds, $currentInterests);

        return response()->json([
            'message' => 'Interests updated successfully',
            'data' => [
                'user_id' => $user->id,
                'newly_attached' => array_values($newlyAttached), // array_values для переиндексации
                'previously_attached' => $currentInterests,
                'current_interests' => $allInterests
            ]
        ], 201);
    }
}
