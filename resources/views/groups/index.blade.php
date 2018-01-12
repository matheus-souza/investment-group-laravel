@extends('templates.master')

@section('page-title')
    Grupos
@endsection

@section('content-view')

    {!! Form::open(['route' => 'group.store', 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])

    @include('form.select', ['select' => 'user_id', 'data' => $user_list,'attributes' => ['placeholder' => 'User ID']])
    @include('form.select', ['select' => 'institution_id', 'data' => $institution_list,'attributes' => ['placeholder' => 'Institution ID']])

    @include('form.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    <table class="default-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do grupo</th>
            <th>Instituição</th>
            <th>Nome do responsável</th>
            <th>Ações</th>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                <td>{{ $group->institution->name }}</td>
                <td>{{ $group->user->name }}</td>
                <td>
                    {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']); !!}
                    {!! Form::submit('Remover') !!}
                    {!! Form::close(); !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        </tr>
    </table>


@endsection
