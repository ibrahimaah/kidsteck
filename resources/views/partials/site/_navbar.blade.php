 
    <div class="menu" style="background-color: var(--site-nav-bg-color) !important">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary kids-active-btn" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                        @else 
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="nav-link btn btn-primary kids-active-btn" href="#" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>
                        </li>                        
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">الصفحة الرئيسية</a>
                        </li>
                        @auth 
                            @if(auth()->user()->is_parent())
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'parent.dashboard' ? 'active' : '' }}"
                                    href="{{ route('parent.dashboard') }}">لوحة التحكم</a>
                            </li>
                            
                            @endif 

                            @if(auth()->user()->is_volunteer())
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'volunteer.dashboard' ? 'active' : '' }}"
                                        href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a>
                                </li>
                            @endif 

                            @if(auth()->user()->is_child())
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'volunteer.dashboard' ? 'active' : '' }}"
                                        href="{{ route('child-dashboard') }}">مرحباً {{ auth()->user()->name }}</a>
                                </li>
                            @endif 
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'stories' ? 'active' : '' }}"
                                href="{{ route('stories') }}">مكتبة القصص</a>
                        </li>
                        @endauth 
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="#about-us">من
                                نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"
                                href="#contact-us">تواصل معنا</a>
                        </li>

                    </ul>
                </div>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('imgs/logo.png') }}" alt=""></a>
            </nav>
        </div>
    </div>
    <!-- end menu -->
    
    