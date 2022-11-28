<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cardo:ital@0;1&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body class="d-flex flex-column h-100">
        @include('inc.nav')

        <main class="flex-shrink-0">
          <div class="container-fluid ">
            {{ $content }}
          </div>
        </main>


      <footer class="blue-bg-color mt-auto py-3">
        <div class="container">
          @include('inc.navigation')
          <span class="text-muted" style="color:white !important" >Providing P.R.O.O.F is a not for profit 501(c)3 oraginazion.</span>
        </div>
      </footer>
    </body>
</html>
        

