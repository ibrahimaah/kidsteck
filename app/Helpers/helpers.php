<?php

use App\Models\Story;
use App\Models\StoryPartUser;
use App\Models\User;
use App\Models\UserPoint;

if (!function_exists('awardPoints')) {
    function awardPoints($user_id, int $points, string $reason = null)
    {
        $user = User::findOrFail($user_id);
        // Ensure only kids receive points
        if ($user->role_id === 4) { // Replace X with the actual role_id for kids
            $userPoint = UserPoint::create([
                'user_id' => $user->id,
                'points' => $points,
                'reason' => $reason,
            ]);

            return $userPoint->points;
        } else {
            return null;
        }
    }


    if (!function_exists('getStoryPartStatus')) {
        function getStoryPartStatus($user_id, $story_part_id)
        {
            $story_part_user = StoryPartUser::where('user_id' , $user_id)->where('story_part_id' , $story_part_id)->first();
              

            if(!$story_part_user)
            {
                return 'locked';
            }
            elseif($story_part_user->is_quiz_success)
            {
                return 'watched quiz-completed';
            }
            else 
            {
                return 'watched';
            }
        }
    }
    if (!function_exists('getStoryPartStatusEmoji')) {
        function getStoryPartStatusEmoji($user_id, $story_part_id)
        {
            $story_part_user = StoryPartUser::where('user_id' , $user_id)->where('story_part_id' , $story_part_id)->first();

            if(!$story_part_user)
            {
                return '🔒';
            }
            elseif($story_part_user->is_quiz_success)
            {
                return '👀✔️';
            }
            else 
            {
                return '👀';
            }
        }
    }

    if (!function_exists('calc_progress')) {
        function calc_progress($user_id,$story_id)
        {
            $story = Story::find($story_id);
            $storyPartsIds = $story->parts()->pluck('id');
            $story_part_user = StoryPartUser::where('user_id' , $user_id)->whereIn('story_part_id',$storyPartsIds)->get();

            if($story_part_user->isEmpty())
            {
                return 0;
            }
            else
            {
                if($story->parts()->count() == 0) return 0; 
                return ($story_part_user->count() / $story->parts()->count()) * 100;
            } 
        }
    }
}
