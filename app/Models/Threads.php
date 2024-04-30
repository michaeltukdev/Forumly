<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'tags',
        'user_id',
        'forum_id',
    ];
}
