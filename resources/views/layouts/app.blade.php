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

  <body class="ps-loading">


    @yield('content')

    @stack('prepend-script')
  @include('includes.script')
      </body>
</html>
