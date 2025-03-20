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
        /** @var \App\Models\User $current_user */

        $current_user = Auth::user();

        if($current_user->is_child())
        {
            if(!$current_user->storyParts()->exists())
            {
                if($story->parts()->exists())
                {
                    $first_story_part_id = $story->parts()->orderBy('id', 'asc')->first()->id;
                    $current_user->storyParts()->attach($first_story_part_id);
                }
            }
        }
        
        return view('site.stories.show',compact('story'));
    }
}
