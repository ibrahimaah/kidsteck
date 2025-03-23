<?php

namespace App\Http\Controllers;

use App\Models\StoryPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryPartController extends Controller
{
    public function can_access_this_part($user,$story_part_id)
    {  
        if(!in_array($story_part_id , $user->storyParts->pluck('id')->toArray()) && $user->is_child())
        {
            abort(403,'يجب عليك اجتياز الاختبار في الجزء السابق !!');
        }
    }

    public function show($story_part_id)
    {
         /** @var \App\Models\User $currentUser */
         $currentUser = Auth::user();

        $this->can_access_this_part($currentUser,$story_part_id);

        $isQuizSuccess = $currentUser->has_passed_quiz($story_part_id);

        $storyPart = StoryPart::findOrFail($story_part_id);

        return view('site.stories.parts.show',compact('storyPart','isQuizSuccess'));
    }

    public function show_quiz($story_part_id)
    {
        /** @var \App\Models\User $currentUser */
        $currentUser = Auth::user();

        $this->can_access_this_part($currentUser,$story_part_id);

        if(!$currentUser->is_child())
        {
            abort(403,"فقط المستخدم من النوع طفل يصرح له الوصول إلى هذه الصفحة");
        }

        if ($currentUser->has_passed_quiz($story_part_id)) 
        {
            abort(403,"لقد أنجزت هذا الاخنبار بالفعل !");
        }

        $storyPart = StoryPart::findOrFail($story_part_id);
        
        return view('site.stories.parts.quiz.index',compact('storyPart'));
    }
}
