@extends('templates.master')

@section('page-title')
    Usuários
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')
    {!! Form::open(['method' => 'post', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('form.input', ['input' => '', 'attributes' => ['placeholder' => 'Nome']])
    @include('form.input', ['input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
    @include('form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
    @include('form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}
@endsection
