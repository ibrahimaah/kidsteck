<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Story extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description', 
        'target_age',
        'added_by',
        'volunteer_id',
        'category_id',
        'is_active',
        // 'status'
    ];

    public function parts()
    {
        return $this->hasMany(StoryPart::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scope for active stories
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
