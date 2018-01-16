@extends('templates.master')

@section('page-title')
    Detalhes do grupo
@endsection

@section('content-view')
    <header>
        <h1>Nome do grupo: {{ $group->name }}</h1>
        <h2>Instituição: {{ $group->institution->name }}</h2>
        <h2>Responsável: {{ $group->user->name    }}</h2>
    </header>

    {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'POST', 'class' => 'form-default']) !!}
    @include('form.select', ['select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'Usuário']])
    @include('form.submit', ['input' => 'Relacionar ao Grupo ' . $group->name])
    {{ Form::close() }}

    @include('user.list', ['user_list' => $group->users])
@endsection
