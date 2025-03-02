<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = ['story_part_id', 'question'];

    public function storyPart()
    {
        return $this->belongsTo(StoryPart::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function correctOption()
    {
        return $this->hasOne(QuestionOption::class)->where('is_correct', true);
    }
}
