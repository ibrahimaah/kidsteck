<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container p-4 bg-white shadow rounded">
                    <h2 class="text-center text-secondary mb-4">تسجيل الدخول</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn kids-active-btn w-100">تسجيل الدخول</button>
                        <a href="{{ route('home') }}" class="text-center d-block mt-3">العودة إلى الصفحة الرئيسية</a>
                    </form>
                    <p class="text-center mt-3">ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
