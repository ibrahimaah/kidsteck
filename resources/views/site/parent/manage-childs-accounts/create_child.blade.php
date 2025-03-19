@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}">لوحة التحكم</a></li> 
          <li class="breadcrumb-item"><a href="{{ route('parent.manage-accounts') }}">إدارة حسابات الأطفال</a></li> 
          <li class="breadcrumb-item active">إضافة حساب طفل</li>
        </ol>
      </nav>

    {{-- <div class="section-title mb-3">
        <h2 class="text-primary">إضافة حساب طفل</h2> 
    </div>
  --}}
    
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



    <form action="{{ route('parent.store_user_child') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="parent_id" value="{{ $parent_id }}"/>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">اسم الطفل</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div> 
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" id="email" dir="rtl" required>
            </div>
        </div>

        <!-- Row 2: Email and Age -->
        <div class="row"> 
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
            </div>
        </div>
 
        <div class="row justify-content-center">
           
            <div class="col-md-3 mb-3">
                <label for="age" class="form-label">العمر</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="أدخل العمر" required>
            </div>
            <div class="col-md-3 mb-3">
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sports" name="interests[]" value="sports">
                        <label class="form-check-label" for="sports">الرياضة</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="music" name="interests[]" value="music">
                        <label class="form-check-label" for="music">الموسيقى</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="reading" name="interests[]" value="reading">
                        <label class="form-check-label" for="reading">القراءة</label>
                    </div>
                </div>
                
            </div>
        </div>
 

        <!-- Submit Button -->
        <div class="row">
            <button type="submit" class="btn btn-primary w-25">حفظ</button>
            <a href="{{ route('parent.manage-accounts') }}" class="btn btn-danger w-25 mx-2">رجوع</a>
        </div>
    </form>
</div>



</div>


@endsection