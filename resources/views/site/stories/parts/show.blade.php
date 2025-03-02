@extends('layouts.app')

@section('content')

<style>
    .video-container {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: auto;
    }
    .video-container video {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .quiz-btn {
        display: none;
        margin-top: 20px;
    }
    .locked {
        opacity: 0.5;
        pointer-events: none;
    }
</style>

<section class="text-center my-5">
    <h2 class="mb-3">📖 {{ $storyPart->title }}</h2>
    <p>{{ $storyPart->description }}</p>

    <!-- Video Section -->
    <div class="video-container">
        <video id="storyVideo" controls>
            <source src="{{ $storyPart->getFirstMediaUrl('videos') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Take Quiz Button (Initially Locked) -->
    <a href="{{ route('story_parts.quiz', $storyPart->id) }}" 
       id="quizBtn" 
       class="btn btn-primary">
       {{-- class="btn btn-primary quiz-btn locked"> --}}
        📝 اجتياز الاختبار
    </a>
</section>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     let video = document.getElementById('storyVideo');
    //     let quizBtn = document.getElementById('quizBtn');

    //     video.onended = function() {
    //         quizBtn.classList.remove('locked');
    //     };
    // });
</script>

@endsection
