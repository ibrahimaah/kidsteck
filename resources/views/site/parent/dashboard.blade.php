@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
        </ol>
      </nav>
    <div class="row justify-content-center align-items-between">
        <div class="col-md-8">
            <a href="{{ route('parent.proposed-stories') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm border-0 rounded-3 p-3">
                    <i class="fas fa-book-open fs-2 text-primary"></i>
                    <h5 class="mt-2">اقتراح قصة</h5>
                </div>
            </a>
        </div>
        <div class="col-md-8">
            <a href="{{ route('parent.manage-accounts') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm border-0 rounded-3 p-3">
                    <i class="fas fa-users-cog fs-2 text-success"></i>
                    <h5 class="mt-2">إدارة الحسابات</h5>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
