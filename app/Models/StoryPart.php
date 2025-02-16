<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryPart extends Model
{
    use HasFactory;

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
    
}
