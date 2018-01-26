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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($institutions as $institution)
        <tr>
            <th scope="row">{{ $institution->id }}</th>
            <td>{{ $institution->name }}</td>
            <td class="btn-toolbar">
                <div class="btn-group mr-2">
                    <a href="{{ route('institution.product.index', $institution->id) }}" class="btn btn-xs btn-secondary">Produtos</a>
                </div>
                <div class="btn-group mr-2">
                    <a href="{{ route('institution.show', $institution->id) }}" class="btn btn-xs btn-info">Detalhes</a>
                </div>
                <div class="btn-group mr-2">
                    <a href="{{ route('institution.edit', $institution->id) }}" class="btn btn-xs btn-warning">Editar</a>
                </div>
                <div class="btn-group mr-2">
                    {!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']); !!}
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
