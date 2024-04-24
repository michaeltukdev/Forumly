<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Forums extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'icon',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ForumCategories::class, 'category_id');
    }

    protected function categoryName(): Attribute
    {
        return Attribute::make(
            fn () => $this->category->name,
        );
    }
}
