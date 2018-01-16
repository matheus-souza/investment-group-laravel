@extends('templates.master')

@section('page-title')
    Edição de instituição
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::model($institution, ['route' => ['institution.update', $institution->id],'method' => 'PUT', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('form.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}

@endsection
