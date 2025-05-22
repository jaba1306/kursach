<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'media_url',
    ];
    protected $hidden = [
        'content',
        'media_url',
    ];

    protected $casts = [
        'content' => 'hashed',
    ];

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chats::class, 'chat_id');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
