@extends('layouts.app')

@section('content')

<style>
    .slider-title i {
    /* font-size: 1.2rem; */
}
</style>
 
<section class="pagetwo our-classes" dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="section-title">
                    <h2>مكتبة القصص</h2>
                    <p>تعلم البرمجة من خلال مجموعة رائعة من القصص المشوقة والممتعة للأطفال .</p>
                </div>
            </div>
        </div>
        <div class="classes-top-area">
            <div class="classes-slider owl-carousel owl-theme">
                @foreach ($stories as $story) 
            
                <div class="classes-slider-item">
                    <div class="slider-img">
                        <img src="{{ $story->getFirstMediaUrl('story_cover_images') }}" alt="Story Cover" class="img-fluid">
                    </div>
                    <div class="slider-description d-flex flex-column">   
                        <div class="slider-text">
                            <h4>{{ $story->title }}</h4>
                            <p>{{ $story->description }}</p>
                        </div>
                        <div class="slider-title p-0" id="story_desc">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="row w-100 justify-content-between align-items-center">

                                        <div class="col align-self-center">
                                            <h2 class="h5 mb-0">{{ $story->target_age }}</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-0">الفئة العمرية</h5> 
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fas fa-child text-info fa-2x"></i>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between p-md-1 align-items-center">

                                        <div class="align-self-center">
                                            <h2 class="h5 mb-0">{{ $story->parts->count() }}</h2>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h5 class="mb-0">عدد الأجزاء</h5> 
                                            </div>
                                            <div>
                                                <i class="fas fa-book text-success fa-2x me-4"></i>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="slider-btn">
                            <a class="btn btn-primary kids-active-btn" href="{{ route('stories.show',$story->id) }}">ابدأ</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- slider -->
        </div>
        <!-- top area -->
        <div class="classes-cloud-one"><img src="{{ asset('site/images/yellow-cloud.png') }}" alt=""></div>
        <div class="classes-cloud-two"><img src="{{ asset('site/images/yellow-cloud.png') }}" alt=""></div>
        <div class="classes-cloud-three"><img src="{{ asset('site/images/yellow-cloud.png') }}" alt=""></div>
    </div>
</section>
<!-- ====================================
    End Our Classes Area Here
========================================= -->
@endsection