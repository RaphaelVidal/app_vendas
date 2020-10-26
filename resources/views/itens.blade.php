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
            <button type="" class="btn btn-primary" data-toggle="modal" data-target="#novoItem">Novo Item</button>
        </div>

        <table class="table table-hover table_datatable w-100">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descição</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itens as $iten)
                <tr>
                    <td style="width: 10%;">{{$iten->nome}}</td>
                    <td style="width: 50%;">{{$iten->descricao}}</td>
                    <td style="width: 10%;">{{$iten->valor}}</td>
                    <td style="width: 10%;">
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
<div class="modal fade" id="novoItem" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('itens.gravaritem') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Novo Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="nome" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">Insira seu primeiro e ultimo nome</small> -->
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea cols="30" rows="5" class="form-control" id="descricao" name="descricao" aria-describedby="emailHelp">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" onKeyPress="return(moeda(this,'.',',',event))">
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