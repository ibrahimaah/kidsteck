@extends('layouts.admin')

@section('content')
<!-- Welcome Section -->
<div class="welcome-section">
    <h1>تفاصيل المستخدم</h1>
    <p>هنا تجد تفاصيل المستخدم المحدد.</p>
</div>

<!-- User Details Section -->
<div class="card p-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <strong>الاسم الكامل:</strong>
            <p>{{ $user->name }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <strong>اسم المستخدم:</strong>
            <p>{{ $user->username }}</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <strong>البريد الإلكتروني:</strong>
            <p>{{ $user->email }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <strong>صلاحية المستخدم:</strong>
            <p>
                @if($user->role_id == 2)
                    متطوع
                @elseif($user->role_id == 3)
                    أب
                @else
                    غير محدد
                @endif
            </p>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('edit_user', $user->id) }}" class="btn btn-primary w-25">تعديل المستخدم</a>
        <a href="{{ url()->previous() }}" class="btn btn-danger w-25 mx-2">رجوع</a>
    </div>
</div>
@endsection
