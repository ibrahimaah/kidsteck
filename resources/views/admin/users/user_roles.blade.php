@extends('layouts.admin')

@section('content')

 

<div class="container p-5">
 

    <h2 class="display-6 text-primary mb-4">الرجاء اختيار صلاحية المستخدم</h2>

    <div class="row gap-3">
        <div class="col-12">
            <a href="{{ route('create_user_by_role',['role'=>'child']) }}" class="btn btn-lg btn-primary w-50">طفل</a> 
        </div>
        <div class="col-12"> 
            <a href="{{ route('create_user_by_role',['role'=>'parent']) }}" class="btn btn-lg btn-primary w-50">أب</a> 
        </div>
        <div class="col-12"> 
            <a href="{{ route('create_user_by_role',['role'=>'volunteer']) }}" class="btn btn-lg btn-primary w-50">متطوع</a>
        </div>
        <div class="col-12 mt-5 text-end">
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-danger">رجوع</a>
        </div>
    </div>


</div>
@endsection