@extends('layouts.site-auth')

@section('content')
    <div class="form-container p-4 bg-white shadow rounded">
        <h2 class="text-center text-secondary mb-4">تسجيل الدخول</h2>

        {{-- Display Error Messages --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ __('validation.attributes.email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required>

            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('validation.attributes.password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    required>
            </div>
            <button type="submit" class="btn kids-active-btn w-100">تسجيل الدخول</button>
            <a href="{{ route('home') }}" class="text-center d-block mt-3">العودة إلى الصفحة الرئيسية</a>
        </form>
        <p class="text-center mt-3">ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب</a></p>
    </div>
@endsection