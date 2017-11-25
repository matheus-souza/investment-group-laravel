<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <title>Investe Bem | Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
</head>
<body>
    <div class="background">

    </div>
    <section id="conteudo-view" class="login">
        <h1>Investe Bem</h1>
        <h3>O nosso gerencidor de investimentos</h3>
        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
        <p>Acesse o sistema</p>

        {{--{!! Form::label('username', 'Usuário', ['class' => 'control-label']) !!}--}}
        {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}

        {{--{!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}--}}
        {!! Form::password('password', null, ['class' => 'input', 'placeholder' => 'Senha']) !!}

        {!! Form::submit('Entrar') !!}

        {!! Form::close() !!}
    </section>
</body>
</html>
