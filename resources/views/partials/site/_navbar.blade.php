<header class="homepage-two header">
    <div class="menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary kids-active-btn" href="#">إنشاء حساب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">الصفحة الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'stories' ? 'active' : '' }}"
                                href="{{ route('stories') }}">مكتبة القصص</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="#">من
                                نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"
                                href="#">تواصل معنا</a>
                        </li>

                    </ul>
                </div>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('imgs/logo.png') }}" alt=""></a>
            </nav>
        </div>
    </div>
    <!-- end menu -->
    <div class="header-shape-one"><img src="{{ asset('site/images/header-shape-01.png') }}" alt=""></div>
    <div class="header-shape-two"><img src="{{ asset('site/images/header-shape-02.png') }}" alt=""></div>
    <div class="header-shape-three"><img src="{{ asset('site/images/footer-01.png') }}" alt=""></div>

    <div class="container" dir="ltr">
        <!-- end menu -->
        <div class="header-slider owl-carousel owl-theme">
            <!-- Item 1 -->
            <div class="header-slider-item">
                <div class="header-slider-text">
                    <h1>مكّن أطفالك من مهارات الغد</h1>
                    <p>البرمجة تُحفز الإبداع وحل المشكلات. قم بتزويد طفلك بالقدرة على البناء والإبداع والابتكار.</p>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="header-slider-item">
                <div class="header-slider-text">
                    <h1>إلهام الإبداع من خلال البرمجة</h1>
                    <p>البرمجة ليست مجرد مهارة، بل هي وسيلة لإطلاق إمكانيات طفلك وتحفيز إبداعهم عبر التكنولوجيا.</p>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="header-slider-item">
                <div class="header-slider-text">
                    <h1>التعليم هو مفتاح المستقبل المشرق</h1>
                    <p>امنح طفلك القوة لصياغة مستقبله من خلال مهارات البرمجة التي تبني الثقة وتفتح الأبواب لفرص لا
                        نهائية.</p>
                </div>
            </div>
        </div>
    </div>



    <div class="cloud">
        <img src="{{ asset('site/images/graybg.png') }}" alt="">
    </div>
</header>