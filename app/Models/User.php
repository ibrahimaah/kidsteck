<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'age',
        'parent_id',
        'preferred_language',
        'interests'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function is_volunteer()
    {
        return $this->role_id == 2;
    }

    public function is_parent()
    {
        return $this->role_id == 3;
    }

    public function is_child()
    {
        return $this->role_id == 4;
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * Get the child users.
     */
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function storyParts()
    {
        return $this->belongsToMany(StoryPart::class, 'story_part_user')->withPivot('is_quiz_success')->withTimestamps();
    }

    public function has_passed_quiz($story_part_id)
    {
        return $this->is_child() && $this->storyParts()
                    ->wherePivot('story_part_id', $story_part_id)  // Assuming the pivot table has 'story_part_id'
                    ->wherePivot('is_quiz_success', true)  // Check if the user has passed the quiz
                    ->exists();
    }

    public function can_access_this_part($story_part_id)
    {
        if ($this->is_child()) 
        {
            if($this->storyParts()->where('story_part_id',$story_part_id)->exists())
            {
                return true;
            }
            else 
            {
                return false;
            }
        }
        else 
        {
            return true;
        }
    }

    public function points()
    {
        return $this->hasMany(UserPoint::class);
    }

    public function totalPoints()
    {
        return $this->points()->sum('points');
    }
    
}
