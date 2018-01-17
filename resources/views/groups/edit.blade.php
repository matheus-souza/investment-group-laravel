@extends('templates.master')

@section('page-title')
    Edição de grupo
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'PUT', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])

    @include('form.select', ['select' => 'user_id', 'data' => $user_list,'attributes' => ['placeholder' => 'User ID']])
    @include('form.select', ['select' => 'institution_id', 'data' => $institution_list,'attributes' => ['placeholder' => 'Institution ID']])

    @include('form.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}

@endsection
