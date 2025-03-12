@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item"><a href="{{ route('volunteer.stories.index') }}">إدارة القصص</a></li>
            <li class="breadcrumb-item active">عرض القصة</li>
        </ol>
    </nav>

    <div class="card p-4">
        <h3 class="mb-3">{{ $story->title }}</h3>

        <div class="mb-2">
            <strong>نوع القصة:</strong> {{ $story->category->name ?? 'غير محدد' }}
        </div>

        <div class="mb-2">
            <strong>الفئة العمرية المستهدفة:</strong> {{ $story->target_age }}
        </div>

        <div class="mb-3">
            <strong>وصف القصة:</strong>
            <p class="mt-2">{{ $story->description }}</p>
        </div>

        <div class="d-flex">
            <a href="{{ route('volunteer.stories.edit', $story->id) }}" class="btn btn-warning">تعديل</a>
            <a href="{{ route('volunteer.stories.index') }}" class="btn btn-danger mx-2">رجوع</a>
        </div>
    </div>
</div>

@endsection
