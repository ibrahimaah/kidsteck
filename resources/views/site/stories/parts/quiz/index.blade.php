@extends('layouts.app')

@section('content')

<style>
    .quiz-container {
        max-width: 600px;
        margin: auto;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    .option-btn {
        width: 100%;
        margin-top: 10px;
        font-size: 1.2rem;
        transition: all 0.3s ease-in-out;
    }
    .correct {
        background-color: #4CAF50 !important;
        color: white;
    }
    .wrong {
        background-color: #f44336 !important;
        color: white;
    }
</style>

<section class="text-center my-4 pt-5">
    <h2 class="mb-3"> اختبار: {{ $storyPart->title }} 📝</h2>
    <div class="quiz-container">
        @foreach($storyPart->questions as $question)
            <div class="mb-4">
                <h4>{{ $question->question }}</h4>
                @foreach($question->options as $option)
                    <button class="btn btn-outline-primary option-btn" 
                            onclick="checkAnswer(this, {{ $option->is_correct ? 'true' : 'false' }})">
                        {{ $option->option_text }}
                    </button>
                @endforeach
            </div>
        @endforeach

        <a href="{{ route('stories.show', $storyPart->story_id) }}" 
           class="btn btn-success mt-4" 
           id="nextBtn" 
           style="display:none;">
            ✅ العودة إلى القصة
        </a>
    </div>
</section>

<script>
    function checkAnswer(button, isCorrect) {
        if (isCorrect) {
            button.classList.add('correct');
            button.innerHTML += " 🎉";
            setTimeout(() => document.getElementById('nextBtn').style.display = 'block', 500);
        } else {
            button.classList.add('wrong');
            button.innerHTML += " ❌";
        }
    }
</script>

@endsection
