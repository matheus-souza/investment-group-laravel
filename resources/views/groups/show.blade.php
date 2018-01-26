@extends('templates.master')

@section('page-title')
    Detalhes do grupo
@endsection

@section('content-view')

    <div class="form-control">

        <h3>Nome do grupo: {{ $group->name }}</h3>
        <h4>Instituição: {{ $group->institution->name }}</h4>
        <h4>Responsável: {{ $group->user->name    }}</h4>

        {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'POST']) !!}
        <div class="form-row">
            @include('form.select', ['select' => 'user_id', 'label' => 'Usuário', 'data' => $user_list])
        </div>
        @include('form.submit', ['input' => 'Relacionar ao Grupo ' . $group->name])
        {{ Form::close() }}
    </div>
    @include('user.list', ['user_list' => $group->users])
@endsection
