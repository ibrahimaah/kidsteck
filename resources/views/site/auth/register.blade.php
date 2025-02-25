<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container p-4 bg-white shadow rounded">
                    <h2 class="text-center text-secondary mb-4">إنشاء حساب جديد</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                       <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">الاسم الكامل</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                            </div>
                       </div>
                       <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">كلمة المرور</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">تأكيد كلمة المرور</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                       </div>
                        <div class="mb-3">
                            <label class="form-label">الدور</label>
                            <select class="form-select" name="role" id="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ __($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" id="ageField" style="display: none;">
                            <label class="form-label">العمر</label>
                            <input type="number" class="form-control" name="age">
                        </div>
                        <button type="submit" class="btn kids-active-btn w-100">إنشاء حساب</button>
                        <a href="{{ route('home') }}" class="text-center d-block mt-3">العودة إلى الصفحة الرئيسية</a>
                    </form>
                    <p class="text-center mt-3">لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            document.getElementById('ageField').style.display = this.value === 'child' ? 'block' : 'none';
        });
    </script>
</body>
</html>
