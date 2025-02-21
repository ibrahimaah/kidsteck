@extends('layouts.admin')

@section('content')
<div class="welcome-section">
    <h1>إضافة جزء جديد للقصة</h1>
    <p>املأ النموذج أدناه لإضافة جزء جديد للقصة.</p>
</div>

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

    <form action="{{ route('admin.story_parts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="story_id" value="{{ $story_id }}" required>

        <div class="row">
            <div class="col-md-5 mb-3">
                <label class="form-label">عنوان الجزء</label>
                <input type="text" class="form-control" name="title" required>
            </div> 
            <div class="col-md-5 mb-3">
                <label class="form-label">رفع فيديو الجزء</label>
                <input type="file" class="form-control" name="video" required accept="video/*">
            </div>
            <div class="col-md-2 mb-3">
                <label class="form-label">رقم الجزء</label>
                <input type="number" class="form-control text-center" name="order" min="1" value="{{ $current_order }}" required readonly>
            </div> 
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">وصف الجزء</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>
        </div>
 

        <div class="row">
            <button type="submit" class="btn btn-primary w-25">حفظ</button>
            <a href="{{ route('admin.story_parts',['story_id' => $story_id]) }}" class="btn btn-danger w-25 mx-2">رجوع</a>
        </div>
    </form>
</div>
@endsection
