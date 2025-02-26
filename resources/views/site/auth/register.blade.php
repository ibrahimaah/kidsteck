<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    <style>
       body {
    position: relative;
    background: url('http://localhost:8000/site/images/kids-bg-1.webp') no-repeat center center;
    background-size: cover;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4); /* Adjust opacity here */
    z-index: 1;
}

.form-container {
    position: relative;
    z-index: 2;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 20px;
    text-align: center;
    max-width: 400px;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

        h2 {
            font-size: 26px;
            color: #ff4500;
            margin-bottom: 15px;
        }

        .form-label {
            font-size: 18px;
            color: #008b8b;
        }

        .form-control {
            border: 2px solid #ffa500;
            border-radius: 15px;
            font-size: 16px;
        }

        .btn-kids {
            background-color: #ff4500;
            color: white;
            font-size: 18px;
            border-radius: 20px;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-kids:hover {
            background-color: #ff6347;
        }

        a {
            font-size: 16px;
            color: #008b8b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .cute-icon {
            width: 70px;
            height: 70px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <img src="{{ asset('imgs/logo.png') }}" alt="Cute Icon" class="cute-icon">
        <h2>🎉 إنشاء حساب جديد 🎉</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label"> الاسم الكامل</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">👤 اختر الدور</label>
                        <select class="form-select" name="role" id="role" required>
                            <option value="parent" {{ old('role') == 'parent' ? 'selected' : '' }}>👪 والد/ة</option>
                            <option value="volunteer" {{ old('role') == 'volunteer' ? 'selected' : '' }}>🤝 متطوع</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">📧 البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">🔒 كلمة المرور</label>
                        <input type="password" class="form-control" name="password" dir="ltr" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">🔄 تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" name="password_confirmation" dir="ltr" required>
                    </div>
                </div>
            </div>
            
            
            
            
            <button type="submit" class="btn btn-kids w-100">🚀 إنشاء الحساب</button>
            <a href="{{ route('login') }}" class="d-block mt-3">🔑 لديك حساب؟ تسجيل الدخول</a>
            <a href="http://localhost:8000" class="text-center d-block mt-3">🏠 العودة إلى الصفحة الرئيسية</a>
        </form>
    </div>
</body>

</html>