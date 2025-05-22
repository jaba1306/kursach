<?php

use App\Exceptions\ApiException;
use App\Http\Controllers\BlockUserController;
use App\Http\Controllers\GetBlockedUsersController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\UnblockUserController;
use App\Http\Controllers\User\Interests\AddUserInterestsController;
use App\Http\Controllers\User\Interests\InterestsController;
use App\Http\Controllers\User\Interests\RemoveUserInterestsController;
use App\Http\Controllers\User\Like\GetUserLikesController;
use App\Http\Controllers\User\Like\LikeUserController;
use App\Http\Controllers\User\ShowUserController;
use App\Http\Controllers\User\ShowUsersController;
use App\Http\Controllers\User\UserProfile\UpdateAvatarController;
use App\Http\Controllers\User\UserProfile\UpdateDateOfBirthController;
use App\Http\Controllers\User\UserProfile\UpdateDescriptionController;
use App\Http\Controllers\User\UserProfile\UpdateGenderController;
use App\Http\Controllers\User\UserProfile\UpdateLocationController;
use App\Http\Controllers\User\UserProfile\UpdateUsernameController;
use App\Http\Controllers\User\UserSecurity\UpdateEmailController;
use App\Http\Controllers\User\UserSecurity\UpdatePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;

Route::post("/registration", Auth\RegistrationController::class);
//Route::post("/login", Auth\LoginController::class);
Route::middleware("auth:sanctum")->group(function (){
    Route::get("/logout", Auth\LogoutController::class);

    Route::get('/user/{user}', ShowUserController::class);

    Route::get('/users', ShowUsersController::class);

    Route::patch('/user/{user}/update-username', UpdateUsernameController::class);
    Route::patch('/user/{user}/update-gender', UpdateGenderController::class);
    Route::post('/user/{user}/update-avatar', [UpdateAvatarController::class, '__invoke']);
    Route::patch('/user/{user}/update-description', UpdateDescriptionController::class);
    Route::patch('/user/{user}/update-dob', UpdateDateOfBirthController::class);
    Route::patch('/user/{user}/update-location', UpdateLocationController::class);

    Route::get('/interests', [InterestsController::class, 'index']);
    Route::post('/users/{user}/interests', AddUserInterestsController::class);
    Route::delete('/user/{user}/interests', RemoveUserInterestsController::class);

    Route::post('/like', LikeUserController::class);
    Route::get('/likes', GetUserLikesController::class);

    // Блокировки
    Route::post('/block', BlockUserController::class);
    Route::post('/unblock', UnblockUserController::class);
    Route::get('/blocked-users', GetBlockedUsersController::class);
});

Route::fallback(function () {
   throw new ApiException(404, 'Not found');
});
