@extends('layouts.app')

@section('content')

 
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
                    <div class="slider-description">   
                        <div class="slider-text">
                            <h4>{{ $story->title }}</h4>
                            <p>{{ $story->description }}</p>
                        </div>
                        <div class="slider-title d-flex justify-content-between">
                            <div class="title-left">
                                <span>الفئة العمرية المستهدفة</span>
                                <span>{{ $story->target_age }}</span>
                            </div>
                            <div class="title-right">
                                <span>عدد الأجزاء</span>
                                <span>{{ $story->parts->count() }}</span>
                            </div>
                        </div>
                        <div class="slider-btn">
                            <a class="btn btn-primary kids-active-btn" href="#">ابدأ</a>
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