@extends('layouts.app')
@section('content')
<hr>
<h2> Administração de Usuários</h2>
<hr>
<div class="form-inline">
    <div class="btn">
        <a href="{{ route('users.create') }}" class="btn btn-success" title="Cadastrar">Cadastrar</a>
    </div>
    <div>
        <form class="form-inline" action="{{ route('users.index') }}">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar?" aria-label="Search" name="search" value="{{ $search }}"/>
            <button type="submit" class="btn btn-primary" title="Pesquisar">
                Pesquisar
            </button>                       
        </form>
    </div>
    &nbsp;
    <div>
        <form class="form-inline" action="{{ route('users.index') }}">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="hidden" placeholder="Pesquisar?" aria-label="Search" name="search" value=""/>
            <button type="submit" class="btn btn-primary" title="Limpar">
                Limpar
            </button>                       
        </form>
    </div>
</div>
<div style="height: 15px;"></div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr style="background-color: #e3f2fd">
                <th style="width: 5%;">Id</th>
                <th style="width: 20%;">Nome</th>
                <th style="width: 20%;">E-mail</th>
                <th style="width: 10%;">Senha</th>
                <th style="width: 25%;">Data de Nascimento</th>
                <th style="width: 20%;text-align: center;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->dt_nascimento }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" title="Editar" style="margin-right: 5px;margin-bottom: 5px;">
                        Editar
                    </a>
                    <button type="button" title="Excluir" class="btn btn-danger" data-toggle="modal" data-target="#confirmar_deletar" data-row="{{$user->id}}">
                        excluir
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="90">
                    Nenhum registro encontrado!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="col-12">
    <div class="col-7" style="float: right;">
        {{ $users->appends(['search' => $search])->links() }}
    </div>
</div>  
<div style="height: 10px;"></div>
<!-- Modal -->
<form action="{{url('/users/remove')}}" method="post">
    <div class="modal fade" id="confirmar_deletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 400px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Deseja realmente excluir este Usuário?</b>
                </div>
                <div class="modal-footer">
                    @if (isset($user->id))
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    @endif
                    {!! Form::submit('Sim', ['class' => 'btn btn-primary']) !!} 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('js')
<script>
    $(function () {
        $('#confirmar_deletar').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget),
                    row_id = button.attr('data-row'),
                    form = $(this).parent('form'),
                    action = form.attr('action');
            form.attr('action', `${action}/${row_id}`)
        });

        $('#confirmar_deletar').on('hidden.bs.modal', function (event) {
            var form = $(this).parent('form');
            form.attr('action', `http://localhost/users`);
        });
    });
</script>
@endpush

