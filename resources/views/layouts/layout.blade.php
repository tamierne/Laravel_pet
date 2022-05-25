<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rnd memories gallery</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
  <div class="head-menu-body">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ route('admin.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
    @endif
  </div>
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

</body>
</html>