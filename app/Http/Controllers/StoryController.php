<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('is_active',true)->get();
        return view('site.stories.index',compact('stories'));
    }
    public function show($id)
    {
        $story = Story::findOrFail($id);
        $storyParts = $story->parts()->orderBy('order','asc')->get();
        /** @var \App\Models\User $current_user */

        $current_user = Auth::user();

        if($current_user->is_child())
        {
            if(!$current_user->storyParts()->exists())
            {
                if($storyParts->isNotEmpty())
                {
                    $first_story_part_id = $story->parts()->orderBy('order', 'asc')->first()->id;
                    $current_user->storyParts()->attach($first_story_part_id,['is_quiz_success' => false]);
                }
            }
        }
        
        return view('site.stories.show',compact('story','storyParts'));
    }
}
