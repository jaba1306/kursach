<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chats extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_chats', 'chat_id', 'user_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Messages::class, 'chat_id');
    }
}
