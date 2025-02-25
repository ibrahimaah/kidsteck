@extends('layouts.admin')

@section('content')

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>إدارة أجزاء القصة: <span class="text-light">{{ $story->title }}</span></h1>
    </div>

    <div class="d-flex justify-content-end mb-3"> 
        <a href="{{ route('admin.story_parts.create', ['story_id' => $story->id]) }}" class="btn btn-primary">
            إضافة جزء جديد
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان الجزء</th>
                <th>الوصف</th>
                <th>الفيديو</th> 
                <th>رقم الجزء</th> 
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storyParts as $part)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $part->title }}</td>
                    <td>{{ Str::limit($part->description, 50) }}</td>
                    <td>
                        @if($part->hasMedia('videos'))
                            <a href="{{ $part->getFirstMediaUrl('videos') }}" target="_blank">عرض الفيديو</a>
                        @else
                            <span class="text-muted">لا يوجد فيديو</span>
                        @endif
                    </td>
                    <td><span>الجزء </span>({{ $part->order }})</td>
                    <td>
                        <a href="{{ route('admin.story_parts.edit', $part->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        
                        <form action="{{ route('admin.story_parts.delete', $part->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection