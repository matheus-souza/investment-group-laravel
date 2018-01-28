<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <title>Investe Bem | @yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css-view')
</head>
<body>
    @include('templates.menu')
    <section id="content-view">
        @yield('content-view')
    </section>
    @yield('js-view')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
