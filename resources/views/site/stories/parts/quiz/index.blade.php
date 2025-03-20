@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f9f9f9;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        padding: 20px;
    }

    .quiz-container {
        background: linear-gradient(135deg, #2575fc,var(--main-color) );
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .question {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .options label {
        display: block;
        width: 100%;
        margin: 10px 0;
        font-size: 1.2rem;
        padding: 10px;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        transition: all 0.3s ease;
        border-radius: 5px;
        cursor: pointer;
    }

    .options input[type="radio"] {
        display: none;
        /* Hide radio buttons */
    }

    .options label:hover {
        background-color: rgba(255, 255, 255, 0.4);
        transform: scale(1.05);
    }

    .options input[type="radio"]:checked+label {
        background-color: #ffc107 !important;
        color: black;
    }
</style>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="quiz-container text-center">
                <h1 class="mb-4">{{ $storyPart->title }} Quiz</h1>

                @foreach($storyPart->questions as $index => $question)
                <div class="question mt-4">{{ $index + 1 }}. {{ $question->question }}</div>
                <div class="options">
                    @foreach($question->options as $option)
                    <input type="radio" id="q{{ $question->id }}a{{ $option->id }}" name="q{{ $question->id }}">
                    <label for="q{{ $question->id }}a{{ $option->id }}">{{ $option->option_text }}</label>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
 


@push('js') 
<script>
   
</script>
@endpush
