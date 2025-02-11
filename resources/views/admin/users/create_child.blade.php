@extends('layouts.admin')

@section('content')
<!-- Welcome Section -->
<div class="welcome-section">
    <h1>إضافة مستخدم (طفل) جديد</h1>
    <p>املأ النموذج أدناه لإضافة مستخدم (طفل) إلى النظام.</p>
</div>

<!-- User Registration Form -->
<div class="card p-4">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



    <form action="{{ route('store_user_child') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">صورة الطفل</label>
                <input type="file" name="profile_img" class="form-control">
            </div>
        </div>
        <!-- Row 1: Name and Username -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">اسم المستخدم</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
        </div>

        <!-- Row 2: Email and Age -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" id="email" dir="rtl" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="age" class="form-label">العمر</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="أدخل العمر" required>
            </div>
        </div>

        <!-- Row 3: Password and Confirm Password -->
        <div class="row">
           
            
        </div>

        <!-- Row 4: Preferred Language and Interests -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="language" class="form-label">لغة البرمجة المفضلة</label>
                <select class="form-select" name="preferred_language" required>
                    <option value="">اختر اللغة</option>
                    <option value="java">Java</option>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="javascript">JavaScript</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">الاهتمامات</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sports" name="interests[]" value="sports">
                        <label class="form-check-label" for="sports">الرياضة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="music" name="interests[]" value="music">
                        <label class="form-check-label" for="music">الموسيقى</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reading" name="interests[]" value="reading">
                        <label class="form-check-label" for="reading">القراءة</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">إضافة مستخدم</button>
            </div>
        </div>
    </form>
</div>
@endsection