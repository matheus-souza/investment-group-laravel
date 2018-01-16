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

    @include('user.list', ['user_list' => $users])

@endsection
