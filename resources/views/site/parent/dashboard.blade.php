@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
          <li class="breadcrumb-item active fw-bold" aria-current="page">لوحة التحكم</li>
        </ol>
    </nav>

    <div class="row justify-content-center g-4">
        <div class="col-md-8">
            <a href="{{ route('parent.proposed-stories') }}" class="text-decoration-none">
                <div class="card text-center shadow-lg border-0 rounded-4 p-4 position-relative overflow-hidden bg-light">
                    <div class="icon-wrapper text-primary mb-3">
                        <i class="fas fa-book-open fs-1"></i>
                    </div>
                    <h5 class="fw-bold">اقتراح قصة</h5>
                    <div class="card-hover-overlay"></div>
                </div>
            </a>
        </div>
        <div class="col-md-8">
            <a href="{{ route('parent.manage-accounts') }}" class="text-decoration-none">
                <div class="card text-center shadow-lg border-0 rounded-4 p-4 position-relative overflow-hidden bg-light">
                    <div class="icon-wrapper text-success mb-3">
                        <i class="fas fa-users-cog fs-1"></i>
                    </div>
                    <h5 class="fw-bold">إدارة الحسابات</h5>
                    <div class="card-hover-overlay"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
    .icon-wrapper {
        transition: transform 0.3s ease-in-out;
    }
    .card:hover .icon-wrapper {
        transform: scale(1.1);
    }
    .card-hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 123, 255, 0.05);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    .card:hover .card-hover-overlay {
        opacity: 1;
    }
</style>

@endsection
