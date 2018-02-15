@extends('templates.master')

@section('page-title')
    Investir
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    <div class="form-control">
        {!! Form::open(['route' => 'moviment.application.store', 'method' => 'POST', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.select', ['select' => 'group_id', 'label' => 'Grupo', 'data' => $group_list,'attributes' => ['placeholder' => 'Grupo']])
            @include('form.select', ['select' => 'product_id', 'label' => 'Produto', 'data' => $product_list,'attributes' => ['placeholder' => 'Produto']])
        </div>
        <div class="form-row">
            @include('form.input', ['input' => 'value', 'attributes' => ['placeholder' => 'Valor']])
        </div>
        @include('form.submit', ['input' => 'Cadastrar'])
        {!! Form::close() !!}
    </div>

@endsection
