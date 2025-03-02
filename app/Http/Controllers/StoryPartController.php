<?php

namespace App\Http\Controllers;

use App\Models\StoryPart;
use Illuminate\Http\Request;

class StoryPartController extends Controller
{
    public function show($story_part_id)
    {
        $storyPart = StoryPart::findOrFail($story_part_id);
        return view('site.stories.parts.show',compact('storyPart'));
    }

    public function show_quiz($story_part_id)
    {
        $storyPart = StoryPart::findOrFail($story_part_id);
        return view('site.stories.parts.quiz.index',compact('storyPart'));
    }
}
