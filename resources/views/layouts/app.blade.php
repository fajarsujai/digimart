<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('frontend')}}/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('frontend')}}/images/favicon.ico" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')

  </head>

  <body>


    @yield('content')

    @include('includes.script')
    @stack('prepend-script')

    <script src="{{ asset('backend/js/here.js') }}"></script>
    <script>
      window.hereApiKey = "{{ env('HERE_API_KEY') }}"
    </script>
      </body>
</html>
