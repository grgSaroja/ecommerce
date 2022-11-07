<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('links')

  </head>
  <body>
    <div class="container-scroller">

    @include('backend.layouts.sidebar')

    @include('backend.layouts.navbar')
    @yield('content')

  
    @include('backend.layouts.footer')
    </div>
    </div>
    </div>
    @yield('scripts')
  </body>
</html>

