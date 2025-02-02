<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم </title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
</head>


<body>

    <!-- Navbar -->
    @include('partials.admin._navbar')

    <!-- Sidebar -->
    @include('partials.admin._sidebar')
   

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="{{ asset('common/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
