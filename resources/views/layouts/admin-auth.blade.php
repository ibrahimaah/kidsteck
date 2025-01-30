<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
     
    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard/css/dashboard.rtl.css') }}" rel="stylesheet">
  </head>
  <body>
     

        <div class="container-fluid">
        <div class="row justify-content-center"> 
            <main>
                @yield('content')
            </main>
        </div>
        </div>


    <script src="{{ asset('common/js/bootstrap.bundle.min.js') }}"></script>

    
  </body>
</html>
