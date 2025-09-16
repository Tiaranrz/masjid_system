<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $title ?? 'App' }}</title>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
   @yield('content')

   <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
   <script src="{{ asset('assets/js/hope-ui.js') }}"></script>
</body>
</html>
