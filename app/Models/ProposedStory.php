<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposedStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_age',
        'parent_id',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}

