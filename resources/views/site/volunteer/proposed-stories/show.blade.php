@extends('layouts.app')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item"><a href="{{ route('volunteer.proposed-stories') }}">القصص المقترحة</a></li>
            <li class="breadcrumb-item active" aria-current="page">تفاصيل القصة</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $proposed_story->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>الوصف:</strong> {{ $proposed_story->description }}</p>
            <p><strong>النوع:</strong> {{ $proposed_story->category->name }}</p>
            <p><strong>الفئة العمرية المستهدفة:</strong> {{ $proposed_story->target_age }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $proposed_story->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('volunteer.proposed-stories') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </div>
</div>
@endsection
