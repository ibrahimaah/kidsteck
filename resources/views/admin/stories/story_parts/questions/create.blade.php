@extends('layouts.admin')

@section('content')
<div class="welcome-section">
    <h1>إضافة سؤال جديد لاختبار الجزء</h1>
    <p>املأ النموذج أدناه لإضافة سؤال جديد للاختبار الخاص بالجزء: <strong>{{ $storyPart->title }}</strong></p>
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

    <form action="{{ route('admin.story_parts.question.store') }}" method="POST">
        @csrf
        <input type="hidden" name="story_part_id" value="{{ $storyPart->id }}" required>

        <div class="mb-3">
            <label class="form-label">نص السؤال</label>
            <input type="text" class="form-control" name="question" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الإجابات</label>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="options[]" placeholder="الإجابة {{ $i + 1 }}" required>
                    </div>
                @endfor
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">الإجابة الصحيحة</label>
            <select class="form-control" name="correct_option" required>
                <option value="">اختر الإجابة الصحيحة</option>
                @for ($i = 0; $i < 4; $i++)
                    <option value="{{ $i }}">الإجابة {{ $i + 1 }}</option>
                @endfor
            </select>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary w-25">حفظ</button>
            <a href="{{ route('admin.story_parts.questions', ['story_part_id' => $storyPart->id]) }}" class="btn btn-danger w-25 mx-2">رجوع</a>
        </div>
    </form>
</div>
@endsection
