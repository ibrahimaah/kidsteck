@extends('layouts.admin')

@section('content')

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>القصص المقترحة</h1> 
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
                <th>الفئة العمرية المستهدفة</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposed_stories as $proposed_story)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td> 
                    <td class="align-middle">{{ $proposed_story->title }}</td>
                    <td class="align-middle">{{ Str::limit($proposed_story->description, 50) }}</td>
                    <td class="align-middle">{{ $proposed_story->target_age }}</td>
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
                        <a href="{{ route('admin.proposed-stories.show', $proposed_story->id) }}" class="btn btn-primary btn-sm">تفاصيل</a>
                    @if($proposed_story->status === 'pending')
                        <form action="{{ route('admin.proposed-stories.accept', $proposed_story->id) }}" 
                                method="POST" 
                                class="d-inline" 
                                onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf 
                            <button type="submit" class="btn btn-success btn-sm">قبول</button>
                        </form> 

                        <form action="{{ route('admin.proposed-stories.reject', $proposed_story->id) }}" 
                                method="POST" 
                                class="d-inline" 
                                onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf 
                            <button type="submit" class="btn btn-danger btn-sm">رفض</button>
                        </form> 

                        
                    @endif
                    <form action="{{ route('admin.proposed-stories.delete', $proposed_story->id) }}" 
                            method="POST" 
                            class="d-inline" 
                            onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf 
                        <button type="submit" class="btn btn-secondary btn-sm">حذف</button>
                    </form> 
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
