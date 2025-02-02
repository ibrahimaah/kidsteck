<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم الإبداعية</title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
</head>


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt me-2"></i>لوحة التحكم
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                     
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="https://via.placeholder.com/80" alt="Logo">
        </div>
        <a href="#"><i class="fas fa-tachometer-alt me-2"></i>لوحة التحكم</a>
        <a href="#"><i class="fas fa-users me-2"></i>المستخدمون</a>
        <a href="#"><i class="fas fa-chart-line me-2"></i>الإحصائيات</a>
        <a href="#"><i class="fas fa-file-alt me-2"></i>التقارير</a>
        <a href="#"><i class="fas fa-cog me-2"></i>الإعدادات</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>مرحبًا بك في لوحة التحكم</h1>
            <p>هذا هو تصميم لوحة تحكم إبداعية مع عناصر تفاعلية.</p>
        </div>

        <!-- Cards Section -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center p-4">
                    <i class="fas fa-users card-icon mb-3"></i>
                    <h4>المستخدمون</h4>
                    <p>إدارة المستخدمين بسهولة.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center p-4">
                    <i class="fas fa-chart-line card-icon mb-3"></i>
                    <h4>الإحصائيات</h4>
                    <p>عرض الإحصائيات المهمة.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center p-4">
                    <i class="fas fa-file-alt card-icon mb-3"></i>
                    <h4>التقارير</h4>
                    <p>إنشاء وتصدير التقارير.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="{{ asset('common/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>