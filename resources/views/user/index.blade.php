@extends('templates.master')

@section('page-title')
    Usuários
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'user.store','method' => 'post', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('form.input', ['input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
    @include('form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
    @include('form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    <table class="default-table">
        <thead>
        <tr>
            <td>#</td>
            <td>CPF</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Nascimento</td>
            <td>E-mail</td>
            <td>Status</td>
            <td>Permissão</td>
            <td>Ações</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->cpf }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->birth }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->permission }}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Remover') !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
