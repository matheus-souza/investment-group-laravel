@extends('templates.master')

@section('page-title')
    Edição de grupo
@endsection

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    <div class="form-control">
        {!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'PUT', 'class' => 'form-default']) !!}
        <div class="form-row">
            @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
            @include('form.select', ['select' => 'user_id', 'label' => 'Usuário', 'data' => $user_list,'attributes' => ['placeholder' => 'User ID']])
        </div>
        <div class="form-row">
            @include('form.select', ['select' => 'institution_id', 'label' => 'Instituição', 'data' => $institution_list,'attributes' => ['placeholder' => 'Institution ID']])
        </div>
        @include('form.submit', ['input' => 'Atualizar'])
        {!! Form::close() !!}
    </div>

@endsection
