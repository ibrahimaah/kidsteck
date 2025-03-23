@extends('layouts.app')

@section('content')

<style>
    .story-header {
        background: url("{{ $story->getFirstMediaUrl('story_cover_images') }}") center/cover no-repeat;
        padding: 50px 0;
        text-align: center;
        color: #fff;
        position: relative;
    }
    .story-header::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.7);
    }
    .story-header h1, .story-header p {
        position: relative;
        z-index: 1;
    }
    .story-header p {
        color: #c7bebe !important;
    }
    .story-parts .card {
        transition: transform 0.3s ease-in-out;
    }
    .story-parts .card:hover {
        transform: translateY(-5px);
    }
    .icon {
        font-size: 2rem;
    }
</style>

<!-- Story Header -->
<section class="story-header">
    <div class="container">
        <h1>{{ $story->title }}</h1>
        <p>{{ $story->description }}</p>
    </div>
</section>

<!-- Story Details -->
<div class="container my-5">
    {{-- <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h3 class="mb-3"><i class="fas fa-child text-info icon"></i> الفئة العمرية</h3>
                    <p class="h5">{{ $story->target_age }}</p>
                </div>
            </div>
        </div>
    </div> --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('stories') }}">مكتبة القصص</a></li> 
          <li class="breadcrumb-item active">تفاصيل القصة - {{ $story->title }}</li> 
          
        </ol>
      </nav>

    <!-- Story Parts -->
    <div class="story-parts mt-5">
        <h2 class="text-center mb-4">🔹 أجزاء القصة 🔹</h2>
        <div class="row justify-content-center">
            @forelse($storyParts as $part)
                <div class="col-md-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h4 class="mb-3 text-primary">{{ $part->title }}</h4>
                            <p>{{ $part->description }}</p>

                              
                            @if(auth()->user()->can_access_this_part($part->id))
                                <a href="{{ route('stories.part.show', $part->id) }}" class="btn btn-primary">
                                    <span>تصفح الجزء </span> <span class="fw-bold">({{ $part->order }})</span>
                                </a>
                            @else    
                                <a href="#" class="btn btn-secondary disabled" style="pointer-events: none; opacity: 0.6;">
                                    <span>تصفح الجزء </span> <span class="fw-bold">({{ $part->order }})</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
            <div class="alert alert-warning text-center">
                لم يقم الأدمن بإضافة أجزاء لهذه القصة
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
