@extends('layouts.app')

@section('content')
<div class="container">
    <div class="homepage-two-bottom">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <div class="homepage-box-single box-one">
                    <div class="box-icon"><i class="fa-solid fa-book-open"></i></div>
                    <h4>قصص تفاعلية ممتعة</h4>
                    <p>أدخل الأطفال في عالم البرمجة من خلال قصص تفاعلية شيقة تجعل التعلم مغامرة لا تُنسى!</p>
                </div>
            </div>
            <!-- col-md -->
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <div class="homepage-box-single box-two">
                    <div class="box-icon two"><i class="fa-solid fa-clipboard-list"></i></div>
                    <h4>اختبارات ممتعة</h4>
                    <p>اختبر مهارات البرمجة لديهم من خلال اختبارات مسلية مليئة بالتحديات، ليشعروا أن التعلم هو لعبة!</p>
                </div>
            </div>
            <!-- col-md -->
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <div class="homepage-box-single box-three">
                    <div class="box-icon three"><i class="fa-solid fa-laptop-code"></i></div>
                    <h4>تعلم مستمر</h4>
                    <p>تشجيع الأطفال على اكتساب المهارات البرمجية والتطور بشكل مستمر من خلال موارد تعليمية موجهة.</p>
                </div>
            </div>
            <!-- col-md -->
        </div>
    </div>
</div>


<!-- ====================================
        End Header Bottom Here
========================================= -->
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12">
				<div class="section-title">
					<h2>Kidsteck حول </h2>
				</div>
			</div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="about-text text-start">
                    <h4>مرحبًا بكم في كيدستيك</h4>
                    <p>في كيدستيك، نؤمن أن تعلم البرمجة يجب أن يكون ممتعًا وجذابًا! نقدم منصة فريدة حيث يمكن للأطفال استكشاف مفاهيم البرمجة من خلال قصص مثيرة واختبارات تفاعلية. هدفنا هو جعل التعلم سهلاً، ممتعًا، ومجزًا للعقول الصغيرة.</p>
                    <a class="btn btn-primary kids-active-btn" href="#">اعرف المزيد</a>
                </div>
            </div>
			<div class="col-12 col-md-6 col-lg-6">
				<div class="about-img">
					<div class="about-main-img">
						<img src="{{ asset('site/images/homepageabout.png') }}" alt=""> 
					</div>
					<div class="about-cloud-img-one"> <img src="{{ asset('site/images/white-cloud.png') }}" alt=""> </div>
					<div class="about-cloud-img-two"> <img src="{{ asset('site/images/white-cloud.png') }}" alt=""> </div>
				</div>
			</div>
		
            
		</div>
	</div>
	
	<div class="about-main-cloud-one"> <img src="{{ asset('site/images/yellow-cloud.png') }}" alt=""></div>
	<div class="about-main-cloud-two"> <img src="{{ asset('site/images/yellow-cloud.png') }}" alt=""></div>
	<div class="about-main-shape-one"> <img src="{{ asset('site/images/shape-01.png') }}" alt=""></div>
	<div class="about-main-shape-two"> <img src="{{ asset('site/images/shape-02.png') }}" alt=""></div>

</section>

<!-- ====================================
        End About Here
========================================= -->
<div class="counter-area home-two">
	<div class="container">
		<div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="home-two single-counter">
                    <div class="counter-single-area">
                        <img src="{{ asset('site/images/counter-01.png') }}" alt="">
                        <span class="counter">1500</span>
                        <p>أطفال يتعلمون البرمجة</p>
                    </div>
                </div>
            </div>
            <!-- col-md-close -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="home-two single-counter">
                    <div class="counter-single-area">
                        <img src="{{ asset('site/images/counter-02.png') }}" alt="">
                        <span class="counter">50</span>
                        <p>اختبارات تفاعلية</p>
                    </div>
                </div>
            </div>
            <!-- col-md-close -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="home-two single-counter">
                    <div class="counter-single-area">
                        <img src="{{ asset('site/images/counter-03.png') }}" alt="">
                        <span class="counter">30</span>
                        <p>قصص ممتعة للتعلم</p>
                    </div>
                </div>
            </div>
            <!-- col-md-close -->
        </div>
        
        
	</div>
	<div class="airplane"><img src="{{ asset('site/images/airplane.png') }}" alt=""></div>

</div>
@endsection