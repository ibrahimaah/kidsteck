@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">إدارة القصص المقترحة</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('parent.proposed_stories.create') }}" class="btn btn-primary">اقتراح قصة جديدة</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th> 
                <th>العنوان</th>
                <th>الوصف</th>
                <th>النوع</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposed_stories as $proposed_story)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
          
                <td class="align-middle">{{ $proposed_story->title }}</td>
                <td class="align-middle">{{ $proposed_story->category->name }}</td>
                <td class="align-middle">{{ Str::limit($proposed_story->description, 50) }}</td>
                <td class="align-middle">
                    @php
                        $statusClasses = [
                            'pending' => 'warning',
                            'accepted' => 'success',
                            'rejected' => 'danger',
                        ];
                
                        $statusLabels = [
                            'pending' => 'قيد الانتظار',
                            'accepted' => 'منشورة',
                            'rejected' => 'مرفوضة',
                        ];
                    @endphp
                
                    <span class="badge bg-{{ $statusClasses[$proposed_story->status] ?? 'secondary' }}">
                        {{ $statusLabels[$proposed_story->status] ?? 'غير معروف' }}
                    </span>
                </td>
                
                <td class="align-middle">
                    <a href="{{ route('parent.proposed_stories.edit', $proposed_story->id) }}"
                        class="btn btn-warning btn-sm">تعديل</a>

                    <form action="{{ route('parent.proposed_stories.delete', $proposed_story->id) }}" method="POST"
                        class="d-inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection