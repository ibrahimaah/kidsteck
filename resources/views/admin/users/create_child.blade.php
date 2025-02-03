@extends('layouts.admin')

@section('content')
<!-- Welcome Section -->
<div class="welcome-section">
    <h1>إضافة مستخدم جديد</h1>
    <p>املأ النموذج أدناه لإضافة مستخدم جديد إلى النظام.</p>
</div>

<!-- User Registration Form -->
<div class="card p-4">
    <form>
        <!-- Row 1: Name and Username -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" id="username" required>
            </div>
        </div>

        <!-- Row 2: Email and Age -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" dir="rtl" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="age" class="form-label">العمر</label>
                <input type="number" class="form-control" id="age" placeholder="أدخل العمر" required>
            </div>
        </div>

        <!-- Row 3: Password and Confirm Password -->
        <div class="row">
           
            <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" class="form-control" id="confirmPassword" required>
            </div>
        </div>

        <!-- Row 4: Preferred Language and Interests -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="language" class="form-label">اللغة المفضلة</label>
                <select class="form-select" id="language" required>
                    <option value="">اختر اللغة</option>
                    <option value="ar">العربية</option>
                    <option value="en">الإنجليزية</option>
                    <option value="fr">الفرنسية</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">الاهتمامات</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sports" value="sports">
                        <label class="form-check-label" for="sports">الرياضة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="music" value="music">
                        <label class="form-check-label" for="music">الموسيقى</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reading" value="reading">
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