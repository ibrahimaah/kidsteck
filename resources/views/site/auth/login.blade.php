<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول </title>
    <link href="http://localhost:8000/common/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="http://localhost:8000/site/css/style.css" rel="stylesheet">
    <style>
        /* Full-screen background */
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

        /* Cute icon above the form */
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
        <h2>🎈 تسجيل الدخول 🎈</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label class="form-label">📧 البريد الإلكتروني</label>
                <input type="email" class="form-control" name="email" value="" required>
            </div>
            <div class="mb-3">
                <label class="form-label">🔒 كلمة المرور</label>
                <input type="password" class="form-control" name="password" required dir="ltr">
            </div>
            <button type="submit" class="btn btn-kids w-100">🚀 تسجيل الدخول</button>
            <p class="text-center mt-3">ليس لديك حساب؟ <a href="{{ route('register') }}">🌟 إنشاء حساب جديد</a></p>
            <a href="{{ route('home') }}" class="text-center d-block mt-3">🏠 العودة إلى الصفحة الرئيسية</a>
        </form>
        
    </div>
</body>
</html>
