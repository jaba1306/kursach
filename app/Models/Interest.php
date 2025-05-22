<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interest extends Model
{
    use HasFactory;

    protected $table = 'interest';

    protected $fillable = [
        'name',
    ];

}
