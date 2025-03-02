<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\StoryPart;
use Exception;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the  questions for a specific story part.
     */
    public function index($story_part_id)
    {
        $storyPart = StoryPart::findOrFail($story_part_id);

        $questions = $storyPart->questions;

        return view('admin.stories.story_parts.questions.index', compact('storyPart', 'questions'));
    }

    /**
     * Show the form for creating a new  question.
     */
    public function create($story_part_id)
    {
        $storyPart = StoryPart::findOrFail($story_part_id);
        return view('admin.stories.story_parts.questions.create', compact('storyPart'));
    }

    /**
     * Store a newly created  question in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'story_part_id' => 'required|exists:story_parts,id',
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2|max:4',
            'options.*' => 'required|string|max:255',
            'correct_option' => 'required|integer|min:0|max:3',
        ]);
    
        try {
            DB::beginTransaction();
    
            // Create the question
            $question = Question::create([
                'story_part_id' => $request->story_part_id,
                'question' => $request->question,
            ]);
    
            // Loop through the options and store them
            foreach ($request->options as $index => $optionText) {
                $isCorrect = ($index == $request->correct_option); // Mark the correct option
    
                $question->options()->create([
                    'option_text' => $optionText,
                    'is_correct' => $isCorrect,
                ]);
            }
    
            DB::commit();
    
            return redirect()->route('admin.story_parts.questions', ['story_part_id' => $request->story_part_id])
                             ->with('success', 'تمت إضافة السؤال بنجاح.');
    
        } catch (Exception $e) {
            DB::rollBack();
            
            // Log the exception or send error feedback
            return back()->withErrors('حدث خطأ أثناء إضافة السؤال، يرجى المحاولة لاحقاً.')->withInput();
        }
    }
    

    /**
     * Show the form for editing the specified  question.
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $storyPart = $question->storyPart;

        return view('admin.stories.story_parts.questions.edit', compact('question', 'storyPart'));
    }

    /**
     * Update the specified  question in the database.
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
    
        $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2|max:4',
            'options.*' => 'required|string|max:255',
            'correct_option' => 'required|integer|min:0|max:3',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Update the question text
            $question->update([
                'question' => $request->question,
            ]);
    
            // Delete existing options before adding new ones
            $question->options()->delete();
    
            // Add new options
            foreach ($request->options as $index => $optionText) {
                $isCorrect = ($index == $request->correct_option); // Mark the correct option
    
                $question->options()->create([
                    'option_text' => $optionText,
                    'is_correct' => $isCorrect,
                ]);
            }
    
            DB::commit();
    
            return redirect()->route('admin.story_parts.questions', ['story_part_id' => $question->story_part_id])
                             ->with('success', 'تم تحديث السؤال بنجاح.');
    
        } catch (Exception $e) {
            DB::rollBack();
    
            // Log the exception or send error feedback
            return back()->withErrors('حدث خطأ أثناء تحديث السؤال، يرجى المحاولة لاحقاً.')->withInput();
        }
    }
    

    /**
     * Remove the specified  question from the database.
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $storyPartId = $question->story_part_id;
        $question->delete();

        return redirect()->route('admin.story_parts.questions', ['story_part_id' => $storyPartId])
                         ->with('success', 'تم حذف السؤال بنجاح.');
    }
}
