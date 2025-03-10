@extends('layouts.admin')

@section('content')

<!-- Welcome Section -->
    <div class="welcome-section">
        <h1>تفاصيل القصة المقترحة</h1> 
    </div>
    <div class="container">
        <div class="card">
            {{-- <div class="card-header">
                <h3>تفاصيل القصة</h3>
            </div> --}}
            <div class="card-body">
                <div class="mb-4">
                    <strong>العنوان:</strong>
                    <p>{{ $proposed_story->title }}</p>
                </div>
                <div class="mb-4">
                    <strong>الوصف:</strong>
                    <p>{{ $proposed_story->description }}</p>
                </div>
                <div class="mb-4">
                    <strong>الفئة العمرية المستهدفة:</strong>
                    <p>{{ $proposed_story->target_age }}</p>
                </div>
                <div class="mb-4">
                    <strong>تم اقتراحها من قبل :</strong>
                    <p>{{ $proposed_story->user->name }}</p>
                </div>
                <div class="mb-4">
                    <strong>الحالة:</strong>
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
                </div>
                
                <div class="d-flex justify-content-between mt-5">
                    

                    <div>
                        @if($proposed_story->status === 'pending')
                            <form action="{{ route('admin.proposed-stories.accept', $proposed_story->id) }}" 
                                    method="POST" 
                                    class="d-inline" 
                                    onsubmit="return confirm('هل أنت متأكد؟')">
                                @csrf 
                                <button type="submit" class="btn btn-success">قبول</button>
                            </form> 

                            <form action="{{ route('admin.proposed-stories.reject', $proposed_story->id) }}" 
                                    method="POST" 
                                    class="d-inline" 
                                    onsubmit="return confirm('هل أنت متأكد؟')">
                                @csrf 
                                <button type="submit" class="btn btn-danger">رفض</button>
                            </form> 
                        @endif
                    </div>
                    <a href="{{ route('admin.proposed-stories') }}" class="btn btn-secondary">رجوع</a>
                </div>
            </div>
        </div>
    </div>

@endsection
