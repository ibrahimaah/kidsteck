@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">إدارة القصص </li>
        </ol>
    </nav>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('volunteer.stories.create') }}" class="btn btn-primary">إضافة قصة جديدة</a>
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
                {{-- <th>النوع</th>
                <th>الفئة العمرية المستهدفة</th> --}}
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stories as $story)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
          
                <td class="align-middle">{{ $story->title }}</td>
                <td class="align-middle">{{ Str::limit($story->description, 50) }}</td>
                {{-- <td class="align-middle">{{ $story->category->name }}</td>
                <td class="align-middle">{{ $story->target_age }}</td> --}}
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
                
                    <span class="badge bg-{{ $statusClasses[$story->status] ?? 'secondary' }}">
                        {{ $statusLabels[$story->status] ?? 'غير معروف' }}
                    </span>
                </td>
                
                <td class="align-middle">

                    <a href="{{ route('volunteer.story_parts.index', $story->id) }}"
                        class="btn btn-secondary btn-sm">إدارة أجزاء القصة</a>

                    <a href="{{ route('volunteer.stories.show', $story->id) }}"
                        class="btn btn-primary btn-sm">عرض</a>

                    <a href="{{ route('volunteer.stories.edit', $story->id) }}"
                        class="btn btn-warning btn-sm">تعديل</a>

                    <form action="{{ route('volunteer.stories.delete', $story->id) }}" method="POST"
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