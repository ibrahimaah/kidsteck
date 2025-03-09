@extends('layouts.app')

@section('content')

<div class="container my-5"> 
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}">لوحة التحكم</a></li> 
          <li class="breadcrumb-item active">إدارة حسابات الأطفال</li>
        </ol>
      </nav>
    {{-- <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="section-title">
                <h2 class="text-primary">إدارة الحسابات</h2>
                <p>قم بإدارة حسابات أطفالك وتتبع نشاطهم على الموقع</p>
            </div>
        </div>
    </div> --}}
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('parent.create_user_child',auth()->id()) }}" class="btn btn-primary">إضافة طفل</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم الطفل</th>
                <th>البريد الالكتروني</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->children as $user)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">

                    <a href="{{ route('parent.edit_user_child',['user_id' => $user->id]) }}"
                        class="btn btn-warning btn-sm">تعديل</a>

                    <form action="{{ route('parent.remove_user_child', $user->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection