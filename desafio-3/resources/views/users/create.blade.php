@extends('layouts.app')
@section('content')
<div class="row form-group">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h5></i> &nbsp;Cadastrar Usuário</h5>
        <hr>
        {{ Form::open(array('url' => 'users')) }}
        <div class="form-group">
            <b>{{ Form::label('name', 'Nome') }}</b>
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('email', 'E-mail') }}</b>
            {{ Form::email('email', '', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('password', 'Senha') }}</b>
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <b>{{ Form::label('dt_nascimento', 'Data de Nascimento') }}</b>
            {{ Form::date('dt_nascimento', '',array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Cadastrar', array('class' => 'btn btn-primary')) }}
        <a href="{{ route('users.index') }}" class="btn btn-danger">Voltar</a>
        {{ Form::close() }}
        <div style="height: 25px;"></div>
    </div>
</div>
@endsection