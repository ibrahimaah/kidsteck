@extends('layouts.app')

@section('content')

<style>
    /* body {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        text-align: center;
        background-color: #ffebcd;
        padding: 20px;
    } */
    .progress-container, .points-container {
        padding: 20px;
        background: rgb(213, 228, 233);
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        border: 4px solid var(--site-nav-bg-color);
        margin-bottom: 30px;
    }
    h2 {
        color: #ff6600;
        font-size: 24px;
    }
    h3 {
        color: #ff4500;
    }
    .progress-bar {
        height: 25px;
        background: #ffcc99;
        border-radius: 15px;
        overflow: hidden;
        border: 3px solid #ff6600;
    }
    .progress-fill {
        height: 100%;
        background: #ff4500;
    }
    .story-parts {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .part {
        width: 120px;
        height: 120px;
        background: #ffd700;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        margin: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 2px 2px #000;
        border: 3px solid #ff6600;
        position: relative;
    }
    .part.unlocked {
        background: #32cd32;
    }
    .part.locked {
        background: #d3d3d3;
        color: #777;
    }
    .part.locked::after {
        content: '\1F512';
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 24px;
    }
    .part.watched {
        background: #32cd32; /* Green for watched */
    }
    .part.quiz-completed {
        background: #ffd700; /* Gold for quiz completed */
    }
    .status-icons {
        font-size: 22px;
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}">لوحة التحكم</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('parent.manage-accounts') }}">إدارة حسابات الأطفال</a></li> 
          <li class="breadcrumb-item active">تتبع حساب الطفل - {{ $user->name }}</li>
        </ol>
      </nav>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="progress-container text-center">
                <h2>🎉 تقدم الطفل 🎈</h2>
            </div>
        
            <div class="points-container text-center">
                ⭐ النقاط المكتسبة: <span id="points">{{ $user->totalPoints() }} نقطة</span>
            </div>
        
            @forelse ($stories as $story)
                @if(!$story->parts()->exists())
                    @continue 
                @endif  
        
                <div class="progress-container">   
                    <h3 class="mb-4">📖 {{ $story->title }}</h3> 
                    <div class="progress-bar my-4">
                        <div class="progress-fill" style="width: {{ calc_progress($user->id,$story->id) }}%;"></div>
                    </div>
                   
                        <div class="story-parts">
                            @forelse ($story->parts()->orderBy('order','asc')->get() as $part)
                            <div class="part {{ getStoryPartStatus($user->id,$part->id) }}">
                                🌟 الجزء <span>({{ $part->order }})</span> 
                                <span class="status-icons">{{ getStoryPartStatusEmoji($user->id,$part->id) }}</span>
                            </div> 
                            @empty
                            <div class="alert alert-warning text-center">
                                لم يتم إضافة أجزاء لهذه القصة من قبل الأدمن بعد
                            </div>
                            @endforelse
                        </div>
                    
                </div>
            @empty
                <div class="alert alert-warning text-center">
                    لم يتم إضافة قصص من قبل الأدمن بعد
                </div>
            @endforelse
        
            <div class="points-container text-center">
                @if ($lastLog)
                    <p>🟢 آخر تسجيل دخول: {{ Carbon\Carbon::parse($lastLog->login_at)->diffForHumans() }}</p>
                    <p>🔴 آخر تسجيل خروج: 
                        {{ $lastLog->logout_at ? Carbon\Carbon::parse($lastLog->logout_at)->diffForHumans() : 'لم يسجل خروج بعد' }}
                    </p>
                @else
                    <p>لا يوجد سجلات تسجيل دخول</p>
                @endif
        
                ⏳ وقت الاستخدام: <span id="time_spent">
                    {{ $hours > 0 ? $hours . ' ساعة و' : '' }} 
                    {{ $minutes > 0 ? $minutes . ' دقيقة و' : '' }} 
                    {{ $remainingSeconds > 0 ? $remainingSeconds . ' ثانية' : '' }}
                </span>
            </div>
        </div>
    </div>
    
</div>

@endsection
