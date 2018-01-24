@extends('templates.master')

@section('page-title')
    Instituições
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    <div class="form-control">
        {!! Form::open(['route' => 'institution.store', 'method' => 'POST', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        </div>
        @include('form.submit', ['input' => 'Cadastrar'])
        {!! Form::close() !!}
    </div>

    <table class="default-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </thead>
        <tbody>
        @foreach($institutions as $institution)
        <tr>
            <td>{{ $institution->id }}</td>
            <td>{{ $institution->name }}</td>
            <td>
                {!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']); !!}
                {!! Form::submit('Remover') !!}
                {!! Form::close(); !!}
                <a href="{{ route('institution.show', $institution->id) }}">Detalhes</a>
                <a href="{{ route('institution.edit', $institution->id) }}">Editar</a>
                <a href="{{ route('institution.product.index', $institution->id) }}">Produtos</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        </tr>
    </table>

@endsection
