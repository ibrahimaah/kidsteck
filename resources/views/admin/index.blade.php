@extends('layouts.admin')
@section('content')
 <!-- Welcome Section -->
 <div class="welcome-section">
    <h1>مرحبًا بك في لوحة التحكم</h1> 
</div>

<!-- Cards Section -->
<div class="row">
    <div class="col-md-4 mb-4">
        <a href="{{ route('admin.users') }}" class="text-reset text-decoration-none">
            <div class="card text-center p-4">
                <i class="fas fa-users card-icon mb-3"></i>
                <h4>المستخدمون</h4>
                <p>إدارة المستخدمين بسهولة.</p>
            </div> 
        </a> 
    </div>
    {{-- <div class="col-md-4 mb-4">
        <div class="card text-center p-4">
            <i class="fas fa-chart-line card-icon mb-3"></i>
            <h4>الإحصائيات</h4>
            <p>عرض الإحصائيات المهمة.</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-center p-4">
            <i class="fas fa-file-alt card-icon mb-3"></i>
            <h4>التقارير</h4>
            <p>إنشاء وتصدير التقارير.</p>
        </div>
    </div> --}}
</div>
@endsection