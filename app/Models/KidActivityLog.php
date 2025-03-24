<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['kid_id', 'login_at', 'logout_at', 'duration'];

    public function kid()
    {
        return $this->belongsTo(User::class, 'kid_id');
    }
}
