@extends('templates.master')

@section('page-title')
    Grupos
@endsection

@section('content-view')

    {!! Form::open(['route' => 'group.store', 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])

    @include('form.select', ['select' => 'user_id', 'data' => $user_list,'attributes' => ['placeholder' => 'User ID']])
    @include('form.select', ['select' => 'institution_id', 'data' => $institution_list,'attributes' => ['placeholder' => 'Institution ID']])

    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    @include('groups.list', ['group_list' => $groups])


@endsection
