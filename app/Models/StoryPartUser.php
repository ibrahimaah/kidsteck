<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryPartUser extends Model
{
    use HasFactory;
    
    protected $table = 'story_part_user'; // Replace with the actual table name

    protected $fillable = [
        'user_id', 'story_part_id', 'is_quiz_success'
    ];
}
