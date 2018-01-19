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

    <table class="default-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Indexador</th>
            <th>Taxas</th>
            <th>Ações</th>
        </thead>
        <tbody>
        @foreach($institution->products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->index }}</td>
                <td>{{ $product->interest_rate }}</td>
                <td>
                    {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']); !!}
                    {!! Form::submit('Remover') !!}
                    {!! Form::close(); !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        </tr>
    </table>

@endsection
