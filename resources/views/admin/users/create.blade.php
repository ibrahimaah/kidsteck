@extends('layouts.admin')

@section('content')
<!-- Welcome Section -->
<div class="welcome-section">
    <h1>إضافة مستخدم جديد</h1>
    <p>املأ النموذج أدناه لإضافة مستخدم جديد إلى النظام.</p>
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="{{ route('store_user') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
            </div>
    
            <div class="col-md-6 mb-3">
                <label for="role_id" class="form-label">صلاحية المستخدم</label>
                <select class="form-select" id="role_id" name="role_id" required>
                    <option value="">اختر صلاحية المستخدم</option>
                    <option value="2">متطوع</option> 
                    <option value="3">أب</option> 
                </select>
            </div>
        </div>
    
        <div class="row">
            <button type="submit" class="btn btn-primary w-25">إضافة مستخدم</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger w-25 mx-2">رجوع</a>
        </div>
    </form>
    
</div>
@endsection