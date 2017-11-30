<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <title>Investe Bem | @yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    @yield('css-view')
</head>
<body>
    @yield('content-view')
    @yield('js-view')
</body>
</html>
