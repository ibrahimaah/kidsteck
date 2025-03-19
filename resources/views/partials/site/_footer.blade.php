<footer class="footer pb-1 pt-4">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-sm-5 text-center">
                <img src="{{ asset('imgs/logo.png') }}" class="img-fluid w-50" alt="شعار Kidsteck">
                <p>kidsteck - منصة ممتعة وتفاعلية حيث يتعلم الأطفال البرمجة من خلال قصص مشوقة واختبارات. نهدف إلى تمكين الأطفال بالإبداع ومهارات حل المشكلات.</p>
            </div>
            
			<!-- col-md-4 -->
			<div class="col-sm-3 text-center">
				<h4>روابط مهمة</h4>
				<ul class="footer-link">
					<li class="nav-item"><a href="" class="nav-link">الصفحة الرئيسية</a></li>
					<li class="nav-item"><a href="" class="nav-link">مكتبة القصص</a></li>
					<li class="nav-item"><a href="" class="nav-link">من نحن</a></li> 
					<li class="nav-item"><a href="" class="nav-link">تواصل معنا</a></li>
				</ul>
			</div>
			<!-- col-md-4 -->
			<div class="col-sm-4 text-center">
				<h4>أحدث القصص</h4>
				<ul class="footer-link">
					@foreach ($stories as $story)
						@if($loop->iteration == 4)
							@continue
						@endif 
						<li class="nav-item"><a href="{{ route('stories.show',$story->id) }}" class="nav-link">{{ $story->title }}</a></li> 
					@endforeach
				</ul>
			</div>
			<!-- col-md-4 -->
			 
			<!-- col-md-4 -->
		</div>
	</div>
	<div class="footer-shape-one"><img src="{{ asset('site/images/shape-11.png') }}" alt=""></div>
	<div class="footer-shape-two"><img src="{{ asset('site/images/shape-11.png') }}" alt=""></div>
	<div class="footer-shape-three"><img src="{{ asset('site/images/dragon.png') }}" alt=""></div>

</footer>