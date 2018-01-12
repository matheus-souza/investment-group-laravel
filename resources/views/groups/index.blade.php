@extends('templates.master')

@section('page-title')
    Grupos
@endsection

@section('content-view')

    {!! Form::open(['route' => 'group.store', 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])

    @include('form.input', ['input' => 'user_id', 'attributes' => ['placeholder' => 'User ID']])
    @include('form.input', ['input' => 'institution_id', 'attributes' => ['placeholder' => 'Institution ID']])

    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}




@endsection
