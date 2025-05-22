<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockRequest;
use App\Models\UserBlockList;
use Illuminate\Support\Facades\DB;

class BlockUserController extends Controller
{
    public function __invoke(BlockRequest $request)
    {
        $user = auth()->user();
        $blockedId = $request->blocked_user_id;

        // Проверка на блокировку самого себя
        if ($user->id == $blockedId) {
            return response()->json(['message' => 'Нельзя блокировать самого себя'], 422);
        }

        // Проверка на существующую блокировку
        if (UserBlockList::where('user_id', $user->id)
            ->where('blocked_id', $blockedId)
            ->exists()) {
            return response()->json(['message' => 'Пользователь уже заблокирован'], 400);
        }

        DB::transaction(function () use ($user, $blockedId) {
            // Создаем блокировку
            UserBlockList::create([
                'user_id' => $user->id,
                'blocked_id' => $blockedId
            ]);

            // Удаляем взаимные лайки (используем правильное имя таблицы)
            DB::table('user_liked')
                ->where(function($query) use ($user, $blockedId) {
                    $query->where('user_id', $user->id)
                        ->where('liked_user_id', $blockedId)
                        ->orWhere('user_id', $blockedId)
                        ->where('liked_user_id', $user->id);
                })
                ->delete();
        });

        return response()->json(['message' => 'Пользователь заблокирован']);
    }
}
