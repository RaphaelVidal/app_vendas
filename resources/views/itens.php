<?php
// dd($usuarios);
?>
@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Itens</h1>
    </div>
    <painel-component tamanho="12">
        <div class="mb-3">
            <button type="" class="btn btn-primary" data-toggle="modal" data-target="#novoUsuario">Novo Usuário</button>
        </div>

        <table id="tabelaUsuarios" class="table_datatable w-100">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        @switch($usuario->perfil)
                        @case('1')
                            Admin
                        @break

                        @case('2')
                            Logística
                        @break
                        @case('3')
                            Cliente
                        @break
                        @default
                            não informado
                        @endswitch
                    </td>
                    <td>
                        <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                        <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </painel-component>

</div>
<!-- /.container-fluid -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="novoUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('usuarios.gravarnovousuario') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">Insira seu primeiro e ultimo nome</small> -->
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">Nunca compartilhe seu e-mail com outra pessoa</small> -->
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="perfil">Perfil de acesso</label>
                        <select name="perfil" id="perfil" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="1">Admin</option>
                            <option value="2">Logística</option>
                            <option value="3">Cliente</option>
                        </select>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection