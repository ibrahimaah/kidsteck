@extends('layouts.admin-auth')

@section('content')


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>تسجيل الدخول</title> 
    <link rel="stylesheet" href="{{ asset('dashboard/css/admin_login.css') }}">
 </head>
  <body class="text-center">
    
  
            <main class="form-signin">
                <form action="{{ route('admin.authenticate') }}" method="POST">
                  @csrf
                    <img class="mb-4" src="{{ asset('imgs/admin.jpg') }}"> 
            
                    <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="floatingInput" required>
                    <label for="floatingInput">البريد الالكتروني</label>
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" required>
                    <label for="floatingPassword">كلمة المرور</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary" type="submit">تسجيل الدخول</button> 
                </form>
                </main>
   
  </body>
</html>


@endsection