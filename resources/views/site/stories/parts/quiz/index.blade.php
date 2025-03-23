@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f9f9f9;
        font-family: 'Comic Sans MS', cursive, sans-serif;
    }

    .quiz-container {
        background: linear-gradient(135deg, #2575fc, var(--main-color));
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
    }

    .options label:hover {
        background-color: rgba(255, 255, 255, 0.4);
        transform: scale(1.05);
    }

    .options input[type="radio"]:checked+label {
        background-color: #ffc107 !important;
        color: black;
    }

    .submit-btn {
        margin-top: 20px;
        background-color: #28a745;
        border: none;
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        transition: 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #218838;
    }
</style>

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('stories') }}">مكتبة القصص</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('stories.show',$storyPart->story->id) }}">تفاصيل القصة - {{ $storyPart->story->title }}</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('stories.part.show',$storyPart->id) }}"><span>تصفح الجزء ({{ $storyPart->order }})</span> - {{ $storyPart->title }}</a></li> 
          {{-- <li class="breadcrumb-item active">اختبار الجزء - {{ $storyPart->title }}</li>  --}}
          <li class="breadcrumb-item active">كويز</li> 
          
        </ol>
      </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            @if($storyPart->questions()->exists())
            <div class="quiz-container text-center">
                {{-- <h1 class="mb-4">اختبار - {{ $storyPart->title }}</h1> --}}
                
                <form action="{{ route('quiz.submit') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="story_part_id" value="{{ $storyPart->id }}" required>
                    @foreach($storyPart->questions as $index => $question)
                        <div class="question mt-4">{{ $loop->iteration }}. {{ $question->question }}</div>
                        <div class="options">
                            @foreach($question->options as $option)
                                <input type="radio" id="q{{ $question->id }}a{{ $option->id }}" 
                                       name="answers[{{ $question->id }}]" 
                                       value="{{ $option->id }}">
                                <label for="q{{ $question->id }}a{{ $option->id }}">{{ $option->option_text }}</label>
                            @endforeach
                        </div>
                    @endforeach

                    <button type="submit" class="mt-3 btn btn-success kids-active-btn">إرسال الإجابات</button>
                </form>
               
            </div>
            @else  
            <div class="alert alert-warning text-center">
                لم تتم إضافة أسئلة لهذا الجزء من قبل الأدمن
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
