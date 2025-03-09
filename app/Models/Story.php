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
        'is_proposed_by_parent',
        'parent_id',
        'category_id',
        'is_active',
    ];

    public function parts()
    {
        return $this->hasMany(StoryPart::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
