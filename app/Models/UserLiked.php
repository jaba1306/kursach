<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLiked extends Model
{
    use HasFactory;
    protected $table = 'user_liked';
    protected $fillable = [
        'user_id',
        'liked_user_id',
    ];
}
