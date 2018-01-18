@extends('templates.master')

@section('page-title')
    Produtos
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('form.input', ['input' => 'description', 'attributes' => ['placeholder' => 'Descrição ']])
    @include('form.input', ['input' => 'index', 'attributes' => ['placeholder' => 'Indexador']])
    @include('form.input', ['input' => 'interest_rate', 'attributes' => ['placeholder' => 'Taxa de juros']])
    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

@endsection
