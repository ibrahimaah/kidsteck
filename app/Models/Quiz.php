<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function part()
    {
        return $this->belongsTo(StoryPart::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
