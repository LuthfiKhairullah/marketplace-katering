<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/vendor/bootstrap/css/bootstrap.min.css', 'resources/vendor/bootstrap-icons/bootstrap-icons.css', 'resources/vendor/boxicons/css/boxicons.min.css', 'resources/vendor/remixicon/remixicon.css', 'resources/vendor/simple-datatables/style.css'])

</head>

<body>
  <?php if (request()->path() != 'login' && request()->path() != 'register') { ?>
    @include('template.header')
    @include('template.sidebar')
  <?php $classid = 'id="main" class="main"';
  } ?>

  <main <?= $classid ?? '' ?>>
    @yield('content')
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @yield('modals')

  @vite(['resources/js/app.js', 'resources/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/vendor/simple-datatables/simple-datatables.js'])
</body>

</html>