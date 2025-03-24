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
<link rel="stylesheet" href="{{ asset('site/css/plyr.css') }}" />
<script src="{{ asset('site/js/plyr.js') }}"></script>

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('stories') }}">مكتبة القصص</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('stories.show',$storyPart->story->id) }}">تفاصيل القصة - {{ $storyPart->story->title }}</a></li> 
          <li class="breadcrumb-item active"><span>تصفح الجزء ({{ $storyPart->order }})</span> - {{ $storyPart->title }}</li> 
        </ol>
    </nav>
    <section class="text-center pt-4">
        <h2 class="mb-3"> {{ $storyPart->title }} 📖</h2>
        <p>{{ $storyPart->description }}</p>
    
       <!-- Video Section -->
        <div class="video-container">
            <video id="storyVideo" class="plyr" controls>
                <source src="{{ $storyPart->getFirstMediaUrl('videos') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

 

    
        <!-- Take Quiz Button (Initially Locked) -->
        {{-- <a href="{{ route('story_parts.quiz', $storyPart->id) }}"  --}}
        
        
        <div class="mt-2">
            @if(auth()->user()->is_child())
            @if(!$isQuizSuccess)
                <a href="{{ route('story_parts.quiz', $storyPart->id) }}" 
                    id="quizBtn" 
                    class="btn btn-primary">
                    {{-- class="btn btn-primary quiz-btn locked"> --}}
                    اجتياز الاختبار 📝
                </a>
            @endif
        @endif 
        </div>
        
    </section>
</div>

<script>
    const player = new Plyr('#storyVideo');
    player.on('timeupdate', () => {
        const currentTime = player.currentTime;
        const duration = player.duration;
        const percentage = (currentTime / duration) * 100;
        document.getElementById('videoSlider').value = percentage;
    });
 
     // Event listener for when the video ends
    //  player.on('ended', () => {
    //     // Trigger AJAX POST request when the video ends
    //     $.ajax({
    //         url: '/award-points', // Replace with your desired endpoint
    //         type: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}', // CSRF token for Laravel 
    //         },
    //         success: function(response) {
    //             alert('success');
    //             // Handle the successful response here
    //         },
    //         error: function(xhr, status, error) {
    //             alert('error');
    //             // Handle the error here
    //         }
    //     });
    // });
</script>
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
