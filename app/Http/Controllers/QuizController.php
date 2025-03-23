<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // Assuming you have a Question model
use App\Models\Option;
use App\Models\Story;
use App\Models\StoryPart;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function submitQuiz(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required', // Ensures each question has an answer
            'story_part_id' => 'required|exists:story_parts,id',
        ], [
            'answers.required' => 'يجب عليك الإجابة على جميع الأسئلة.',
            'answers.*.required' => 'يجب عليك اختيار إجابة لكل سؤال.',
        ]);
        
        $storyPart = StoryPart::with('questions.options')->findOrFail($request->story_part_id);

        $answers = $request->input('answers', []);
        
        $score = 0;
        $totalQuestions = $storyPart->questions->count();

        foreach ($storyPart->questions as $question) 
        {
            $correctOption = $question->options->where('is_correct', true)->first();

            if ($correctOption && isset($answers[$question->id]) && $answers[$question->id] == $correctOption->id) {
                $score++;
            }
        }

        $nextPart = $storyPart->nextPart();
        
        if ($score == $totalQuestions) 
        {
            /** @var \App\Models\User $currentUser */
            $currentUser = Auth::user(); 

            $currentUser->storyParts()->updateExistingPivot($storyPart->id, ['is_quiz_success' => true]);
         
            
            if ($nextPart) 
            {
                $currentUser->storyParts()->attach($nextPart->id, ['is_quiz_success' => false]);
            } 
        }

        return view('site.stories.parts.quiz.result', compact('score', 'totalQuestions', 'storyPart','nextPart'));
    }

    
    public function certificate($story_id)
    {
        $story = Story::findOrFail($story_id);
        return view('site.stories.parts.quiz.certificate',compact('story'));
    }
}
