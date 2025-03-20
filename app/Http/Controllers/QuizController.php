<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // Assuming you have a Question model
use App\Models\Option;

class QuizController extends Controller
{
    public function submitQuiz(Request $request)
    {
        // Get the selected answers from the request
        $answers = $request->input('answers'); // Array of answers: questionId => selectedOptionId

        $results = [];

        // Loop through each answer to check if it is correct
        foreach ($answers as $questionId => $selectedOptionId) {
            // Fetch the question and its options
            $question = Question::find($questionId);
            $selectedOption = $question->options()->find($selectedOptionId); // Get the selected option for this question

            // Check if the selected option is correct
            $isCorrect = $selectedOption && $selectedOption->is_correct;

            // Store the result for this question
            $results[$questionId] = [
                'selected' => $selectedOptionId,
                'isCorrect' => $isCorrect // True if the option is correct, false if not
            ];
        }

        // Return the result back to the frontend
        return response()->json([
            'success' => true,  // Indicating the request was successful
            'results' => $results // Send the results back (selected option and correctness)
        ]);
    }
}
