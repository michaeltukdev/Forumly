<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategories extends Model
{
    use HasFactory;

    protected $table = 'forum_categories';

    protected $fillable = [
        'name',
        'slug',
        'summary',
    ];

    public function forums()
    {
        return $this->hasMany(Forums::class, 'category_id', 'id');
    }
}
