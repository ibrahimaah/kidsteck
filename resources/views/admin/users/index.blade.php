@extends('layouts.admin')

@section('content')
 

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>إدارة المستخدمين</h1> 
    </div>

    <div class="d-flex justify-content-end mb-3"> 
        <a href="{{ route('create_user') }}" class="btn btn-primary">إضافة مستخدم جديد</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>اسم المستخدم</th>
                <th>البريد الالكتروني</th>
                <th>صلاحية المستخدم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ __($user->role->name) }}</td>
                    <td>
                        <a href="{{ route('show_user',['user' => $user->id]) }}" class="btn btn-secondary btn-sm">عرض</a>
                        <a href="{{ route('edit_user', $user->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('delete_user', $user->id) }}" 
                              method="POST" 
                              class="d-inline" 
                              onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                        {{-- @if($user->role_id == 3)
                        <a href="{{ route('create_user_child') }}" class="btn btn-primary btn-sm">إضافة طفل</a>
                        @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

@endsection
