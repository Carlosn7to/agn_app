<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--<script src="{{ asset('js/script.js') }}" defer></script> -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <title>@yield('title')</title>
</head>
<body>
<div id="app">
    @yield('content')
</div>
<!--<script src="{{ asset('js/jQuery/jquery-3.6.0.js') }}"></script> -->
</body>
</html>

