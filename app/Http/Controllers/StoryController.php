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
        $storyPartsIds = $story->parts()->orderBy('order','asc')->pluck('id');
       
        /** @var \App\Models\User $current_user */

        $current_user = Auth::user();

        if($current_user->is_child())
        {
            // $story_parts_kid = $current_user->storyParts()->where();
            $has_already_view = $current_user->storyParts()->whereIn('story_part_id',$storyPartsIds)->exists();
            
            if(!$has_already_view && !empty($storyPartsIds))
            {
                $first_story_part_id = $story->parts()->orderBy('order', 'asc')->first()->id;
                $current_user->storyParts()->attach($first_story_part_id,['is_quiz_success' => false]);   
            }
        }
        
        return view('site.stories.show',compact('story','storyParts'));
    }
}
