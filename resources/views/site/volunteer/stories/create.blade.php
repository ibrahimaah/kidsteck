@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item"><a href="{{ route('volunteer.stories.index') }}">إدارة القصص </a></li>
            <li class="breadcrumb-item active">إضافة قصة جديدة</li>
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        <form action="{{ route('volunteer.stories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">عنوان القصة</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
              
                <div class="col-md-4 mb-3">
                    <label class="form-label">نوع القصة</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">اختر النوع</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach 
                    </select>
                </div>
                
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">صورة الغلاف</label>
                        <input type="file" class="form-control" id="cover_image" name="story_cover_image" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">الفئةالعمرية المستهدفة</label>
                        <select class="form-select" name="target_age" required>
                            <option value="">اختر الفئة العمرية المستهدفة</option>
                            <option value="[4-6]">[4-6]</option>
                            <option value="[6-8]">[6-8]</option>
                            <option value="[8-10]">[8-10]</option>
                        </select>
                    </div>
                </div>
                 
            </div>
        
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">وصف القصة</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
            </div>
         
         
         
            <div class="row">
                <button type="submit" class="btn btn-primary w-25">حفظ</button>
                <a href="{{ route('volunteer.stories.index') }}" class="btn btn-danger w-25 mx-2">رجوع</a>
            </div>
        </form>
        
    </div>
</div>

@endsection