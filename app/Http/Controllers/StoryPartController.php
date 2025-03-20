<?php

namespace App\Http\Controllers;

use App\Models\StoryPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryPartController extends Controller
{
    public function show($story_part_id)
    {
        $storyPart = StoryPart::findOrFail($story_part_id);

        if(auth()->user()->is_child() && !in_array($storyPart->id,auth()->user()->storyParts->pluck('id')->toArray()))
        {
            abort(403,'يجب عليك اجتياز الاختبار في الجزء السابق !!');
        }
        
        return view('site.stories.parts.show',compact('storyPart'));
    }

    public function show_quiz($story_part_id)
    {
        if(!Auth::user()->is_child())
        {
            abort(403,"فقط المستخدم من النوع طفل يصرح له الوصول إلى هذه الصفحة");
        }
        
        $storyPart = StoryPart::findOrFail($story_part_id);
        return view('site.stories.parts.quiz.index',compact('storyPart'));
    }
}
