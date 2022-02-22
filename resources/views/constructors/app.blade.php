<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="csrf-toker" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="header_prod">
    <div class="container flex">
        <div class="logo_title">Todo</div>
        @yield('header')
        <div class=""><a class="logout_prod" href="{{ route('logout') }}">Logout</a></div>
    </div>
</header>
@yield('content')
</body>
</html>
