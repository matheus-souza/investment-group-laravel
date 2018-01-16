@extends('templates.master')

@section('page-title')
    Edição de usuário
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::model($user, ['route' => ['user.update', $user->id],'method' => 'PUT', 'class' => 'form-default']) !!}
    @include('user.form-fields')
    @include('form.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}

@endsection
