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

    <div class="form-control">
        {!! Form::open(['route' => 'user.store','method' => 'post']) !!}
        @include('user.form-fields')
        @include('form.submit', ['input' => 'Cadastrar'])
        {!! Form::close() !!}
    </div>

    @include('user.list', ['user_list' => $users])

@endsection
