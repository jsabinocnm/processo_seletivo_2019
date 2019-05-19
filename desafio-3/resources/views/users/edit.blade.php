{{-- \resources\views\users\edit.blade.php --}}

@extends('layouts.app')

@section('title', '| Edit User')

@section('content')
<div class="row form-group">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h5><i class='fa fa-pencil-square'></i> Editar {{$user->name}}</h5>
        <hr>
        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}
        <div class="form-group">
            <b>{{ Form::label('name', 'Nome') }}</b>
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('email', 'E-mail') }}</b>
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('password', 'Senha') }}</b>
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('password', 'Confirme a Senha') }}</b>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
            <b>{{ Form::label('dt_nascimento', 'Data de Nascimento') }}</b>
            {{ Form::date('dt_nascimento', null,array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
        <a href="{{ route('users.index') }}" class="btn btn-danger">Voltar</a>
        {{ Form::close() }}
    </div>
</div>
</div>

@endsection