@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}">لوحة التحكم</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('parent.manage-accounts') }}">إدارة حسابات الأطفال</a></li> 
          <li class="breadcrumb-item active">تعديل حساب طفل</li>
        </ol>
      </nav>

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

        <form action="{{ route('parent.update_user_child', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="parent_id" value="{{ $user->parent_id }}"/>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">اسم الطفل</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
                </div> 
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" id="email" dir="rtl" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">كلمة المرور الجديدة</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label for="age" class="form-label">العمر</label>
                    <input type="number" class="form-control" name="age" id="age" value="{{ old('age', $user->age) }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="language" class="form-label">لغة البرمجة المفضلة</label>
                    <select class="form-select" name="preferred_language" required>
                        <option value="">اختر اللغة</option>
                        <option value="java" {{ $user->preferred_language == 'java' ? 'selected' : '' }}>Java</option>
                        <option value="php" {{ $user->preferred_language == 'php' ? 'selected' : '' }}>PHP</option>
                        <option value="python" {{ $user->preferred_language == 'python' ? 'selected' : '' }}>Python</option>
                        <option value="javascript" {{ $user->preferred_language == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">الاهتمامات</label>
                    <div>
                        @php
                            $interests = json_decode($user->interests, true) ?? [];
                        @endphp
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sports" name="interests[]" value="sports" {{ in_array('sports', $interests) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sports">الرياضة</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="music" name="interests[]" value="music" {{ in_array('music', $interests) ? 'checked' : '' }}>
                            <label class="form-check-label" for="music">الموسيقى</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="reading" name="interests[]" value="reading" {{ in_array('reading', $interests) ? 'checked' : '' }}>
                            <label class="form-check-label" for="reading">القراءة</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary w-25">حفظ التعديلات</button>
                <a href="{{ route('parent.manage-accounts') }}" class="btn btn-danger w-25 mx-2">رجوع</a>
            </div>
        </form>
    </div>
</div>

@endsection
