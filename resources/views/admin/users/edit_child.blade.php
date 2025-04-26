@extends('layouts.admin')

@section('content')
<!-- Edit User Section -->
<div class="welcome-section">
    <h1>تعديل بيانات المستخدم (طفل)</h1>
    <p>قم بتحديث بيانات المستخدم حسب الحاجة.</p>
</div>

<!-- Edit User Form -->
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

    <form action="{{ route('update_user_child', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

       

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">اسم المستخدم</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="age" class="form-label">العمر</label>
                <input type="number" class="form-control" name="age" id="age" value="{{ $user->age }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="language" class="form-label">لغة البرمجة المفضلة</label>
                <select class="form-select" name="preferred_language" required>
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
                        $userInterests = json_decode($user->interests, true);
                    @endphp

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sports" name="interests[]" value="sports" 
                            {{ in_array('sports', $userInterests) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sports">الرياضة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="music" name="interests[]" value="music" 
                            {{ in_array('music', $userInterests) ? 'checked' : '' }}>
                        <label class="form-check-label" for="music">الموسيقى</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reading" name="interests[]" value="reading" 
                            {{ in_array('reading', $userInterests) ? 'checked' : '' }}>
                        <label class="form-check-label" for="reading">القراءة</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary w-25">حفظ</button>
            <a href="{{ route('admin.users') }}" class="btn btn-danger w-25 mx-2">رجوع</a>
        </div>
    </form>
</div>
@endsection
