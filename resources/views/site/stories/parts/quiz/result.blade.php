@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #fce4ec;
        font-family: 'Tajawal', sans-serif;
        text-align: center;
    }

    .result-container {
        background: linear-gradient(135deg, #2575fc, var(--main-color));
        color: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        margin-top: 50px;
        max-width: 600px;
        margin: auto;
    }

    .emoji {
        font-size: 4rem;
    }

    .score {
        font-size: 2rem;
        font-weight: bold;
    }

    .message {
        font-size: 1.5rem;
        margin-top: 10px;
    }

    .retry-btn {
        margin-top: 20px;
        font-size: 1.5rem;
        padding: 10px 20px;
        border-radius: 10px;
        background: orange;
        color: black;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .retry-btn:hover {
        background: orangered;
        transform: scale(1.1);
    }
</style>

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('stories') }}">مكتبة القصص</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('stories.show',$storyPart->story->id) }}">تفاصيل القصة - {{ $storyPart->story->title }}</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('stories.part.show',$storyPart->id) }}"><span>تصفح الجزء ({{ $storyPart->order }})</span> - {{ $storyPart->title }}</a></li> 
          <li class="breadcrumb-item active">نتيجة الاختبار</li>
        </ol>
    </nav>
    <div class="result-container my-5">
        @if($score == $totalQuestions)
            <div class="emoji">🎉🎊</div>
            <h2>رائع جدًا!</h2>
            <p class="score text-light">لقد حصلت على {{ $score }} من {{ $totalQuestions }}!</p>
            <p class="message text-light">أنت بطل حقيقي! 🚀💫</p>
            @if($nextPart)
                <a href="{{ route('stories.part.show',$nextPart->id) }}" class="retry-btn"> متابعة </a>
            @else    
                <p class="message text-light">🎉 مبروك! لقد أكملت جميع الاختبارات لهذه القصة! 🌟📚</p>
                <p class="message text-light">أنت نجم رائع في عالم القصص! 🚀✨</p>
                <a href="{{ route('stories') }}" class="retry-btn">🔙 عُد إلى مكتبة القصص</a>
            @endif
        @elseif($score >= $totalQuestions / 2)
            <div class="emoji">😊👍</div>
            <h2>عمل رائع!</h2>
            <p class="score text-light">لقد حصلت على {{ $score }} من {{ $totalQuestions }}!</p>
            <p class="message text-light">جيد جدًا! استمر في التعلم! 📖💡</p>
            <a href="{{ url()->previous() }}" class="retry-btn">🔄 إعادة الاختبار</a>
        @else
            <div class="emoji">😃🌟</div>
            <h2>محاولة جيدة!</h2>
            <p class="score text-light">لقد حصلت على {{ $score }} من {{ $totalQuestions }}!</p>
            <p class="message text-light">لا تقلق، يمكنك المحاولة مرة أخرى! 💪🎯</p>
            <a href="{{ url()->previous() }}" class="retry-btn">🔄 إعادة الاختبار</a>
        @endif

        
    </div>
</div>
@endsection
