<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <title>Investe Bem | Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1>Investe Bem</h1>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'user.login', 'method' => 'POST']) !!}
                        <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail/Usuário" name="username" type="email" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                @include('form.submit', ['input' => 'Entrar'])
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
