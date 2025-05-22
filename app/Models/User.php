<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'gender',
        'profile_description',
        'date_of_birth',
        'avatar',
        'location',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'user_interests', 'user_id', 'interest_id');
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_liked', 'user_id', 'liked_user_id');
    }

    public function likesFromUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_likes', 'user_id', 'likes_user_id');
    }

    public function blockedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_block_list', 'user_id', 'blocked_id');
    }
}
