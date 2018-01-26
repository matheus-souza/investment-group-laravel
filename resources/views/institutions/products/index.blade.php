@extends('templates.master')

@section('page-title')
    Produtos
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    <div class="form-control">
        {!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'POST', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
            @include('form.input', ['input' => 'description', 'attributes' => ['placeholder' => 'Descrição ']])
        </div>
        <div class="form-row">
            @include('form.input', ['input' => 'index', 'attributes' => ['placeholder' => 'Indexador']])
            @include('form.input', ['input' => 'interest_rate', 'attributes' => ['placeholder' => 'Taxa de juros']])
        </div>
        @include('form.submit', ['input' => 'Cadastrar'])
        {!! Form::close() !!}
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Indexador</th>
                <th scope="col">Taxas</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($institution->products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->index }}</td>
                <td>{{ $product->interest_rate }}</td>
                <td class="btn-toolbar">
                    <div class="btn-group mr-2">
                        {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']); !!}
                        <button type="submit" class="btn btn-danger">Remover</button>
                        {!! Form::close(); !!}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        </tr>
    </table>

@endsection
