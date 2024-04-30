<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Coduo\PHPHumanizer\NumberHumanizer;

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

    public function threads()
    {
        return $this->hasMany(Threads::class, 'forum_id', 'id');
    }

    public function totalThreads()
    {
        return NumberHumanizer::metricSuffix($this->threads()->count());
    }

    public function recentThread()
    {
        return $this->threads()->latest()->first();
    }

    protected function categoryName(): Attribute
    {
        return Attribute::make(
            fn () => $this->category->name,
        );
    }
}
