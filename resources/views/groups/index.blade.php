@extends('templates.master')

@section('page-title')
    Grupos
@endsection

@section('content-view')

    <div class="form-control">
        {!! Form::open(['route' => 'group.store', 'method' => 'POST', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
            @include('form.select', ['select' => 'user_id', 'label' => 'Usuário', 'data' => $user_list,'attributes' => ['placeholder' => 'User ID']])
        </div>
        <div class="form-row">
            @include('form.select', ['select' => 'institution_id', 'label' => 'Instituição', 'data' => $institution_list,'attributes' => ['placeholder' => 'Institution ID']])
        </div>
        @include('form.submit', ['input' => 'Cadastrar'])
        {!! Form::close() !!}
    </div>

    @include('groups.list', ['group_list' => $groups])


@endsection
