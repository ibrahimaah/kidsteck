<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class StoryPart extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'story_id', 'title', 'description', 'order',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    // Optionally, you can define a custom method for fetching the video URL
    public function getVideoUrl()
    {
        return $this->getFirstMediaUrl('videos'); // 'videos' is the collection name
    }

    
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
