<?php

use App\Models\User;
use App\Models\UserPoint;

if (!function_exists('awardPoints')) 
{
    function awardPoints($user_id, int $points, string $reason = null)
    {
        $user = User::findOrFail($user_id);
        // Ensure only kids receive points
        if ($user->role_id === 4) 
        { // Replace X with the actual role_id for kids
            $userPoint = UserPoint::create([
                'user_id' => $user->id,
                'points' => $points,
                'reason' => $reason,
            ]);

            return $userPoint->points;
        }
        else 
        {
            return null;
        }
    }  
}


 
