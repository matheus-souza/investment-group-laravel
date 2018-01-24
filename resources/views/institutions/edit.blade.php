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

    <div class="form-control">
        {!! Form::model($institution, ['route' => ['institution.update', $institution->id],'method' => 'PUT', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        </div>
        @include('form.submit', ['input' => 'Atualizar'])
        {!! Form::close() !!}
    </div>

@endsection
