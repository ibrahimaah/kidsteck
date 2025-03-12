@extends('layouts.admin')

@section('content')

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>إدارة القصص</h1> 
    </div>

    <div class="d-flex justify-content-end mb-3"> 
        <a href="{{ route('admin.stories.create') }}" class="btn btn-primary">إضافة قصة جديدة</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>صورة الغلاف</th>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>أضيفت من قبل</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stories as $story)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        @if($story->hasMedia('story_cover_images'))
                            <img src="{{ $story->getFirstMediaUrl('story_cover_images', 'thumb') }}" width="70" height="70" class="rounded">
                        @else
                            <span class="text-muted">لا توجد صورة</span>
                        @endif
                    </td>
                    <td class="align-middle">{{ $story->title }}</td>
                    <td class="align-middle">{{ Str::limit($story->description, 50) }}</td>
                    <td class="align-middle">{{ $story->added_by == "admin" ? "أدمن" : "متطوع"}}</td>
                    <td class="align-middle">
                        <span class="badge bg-{{ $story->is_active ? 'success' : 'secondary' }}">
                            {{ $story->is_active  ? 'منشورة' : 'مسودة' }}
                        </span>
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('admin.stories.edit', ['id' => $story->id]) }}" class="btn btn-warning btn-sm">تعديل</a>
                        
                        <form action="{{ route('admin.stories.delete', ['id' => $story->id]) }}" 
                                method="POST" 
                                class="d-inline" 
                                onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf 
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form> 

                        <a href="{{ route('admin.story_parts',['story_id' => $story->id]) }}" class="btn btn-sm btn-secondary">إدارة القصة</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
