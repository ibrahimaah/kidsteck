@extends('layouts.admin')

@section('content')

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>إدارة اختبار الجزء: <span class="text-light">{{ $storyPart->title }}</span></h1>
    </div>

    <div class="d-flex justify-content-end mb-3"> 
        <a href="{{ route('admin.story_parts.question.create', ['story_part_id' => $storyPart->id]) }}" class="btn btn-primary">
            إضافة سؤال جديد
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>السؤال</th>
                <th>الإجابات</th>
                <th>الإجابة الصحيحة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $question->question }}</td>
                    <td class="align-middle">
                        <ul>
                            @foreach($question->options as $option)
                                <li>{{ $option->option_text }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="align-middle">
                        @if($question->correctOption)
                            <span class="badge bg-success">{{ $question->correctOption->option_text }}</span>
                        @else
                            <span class="text-muted">لم يتم التحديد</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('admin.story_parts.question.edit', $question->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        
                        <form action="{{ route('admin.story_parts.question.delete', $question->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.story_parts',$storyPart->id) }}" class="btn btn-danger">رجوع</a>
    </div>
@endsection
