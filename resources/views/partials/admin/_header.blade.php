<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fw-bold text-center" href="{{ route('admin_dashboard') }}">Kidsteck</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="بحث" aria-label="بحث" >
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf 
            <input type="submit" class="btn btn-dark px-3" value="تسجيل الخروج">
        </form>
        </div>
    </div>
</header>