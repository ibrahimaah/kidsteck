<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('admin_dashboard') }}">
            KIDSTECK
            {{-- <img src="{{ asset('imgs/logo.png') }}" class="img-fluid" style="width: 100px;height:50px"> --}}
        </a>

        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent">
                            <i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج
                        </button>
                    </form>
                    
                </li>
            </ul>
        </div>

    </div>
</nav>