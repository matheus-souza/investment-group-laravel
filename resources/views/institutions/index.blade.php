@extends('templates.master')

@section('page-title')
    Instituições
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'institution.store', 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

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
            </td>
        </tr>
        @endforeach
        </tbody>
        </tr>
    </table>

@endsection
