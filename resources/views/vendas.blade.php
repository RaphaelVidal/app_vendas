<?php
// dd($usuarios);
?>
@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Venda</h1>
    </div>
    <painel-component tamanho="12">
        <!-- <div class="mb-3">
            <button type="" class="btn btn-primary" data-toggle="modal" data-target="#novoEstoque" onclick="buscarItens()"></button>
        </div> -->

        <table class="table table-hover table_datatable w-100">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                <tr>
                    <td>{{$venda->nomeCliente}}</td>
                    <td>{{$venda->nomeItem}}</td>
                    <td>{{$venda->quantidade}}</td>
                    <td>{{$venda->valorTotal}}</td>
                    <td>{{$venda->dataVenda}}</td>
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
<div class="modal fade" id="novoEstoque" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('estoque.gravarEstoque') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Novo Estoque</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Item</label>
                        <!-- <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"> -->
                        <select name="idItem" id="idItem" class="form-control" required>

                        </select>
                        <!-- <small id="emailHelp" class="form-text text-muted">Insira seu primeiro e ultimo nome</small> -->
                    </div>
                    <div class="form-group">
                        <label for="unidadeMedida">Unidade de Medida</label>
                        <select name="unidadeMedida" id="unidadeMedida" class="form-control" required>
                            <option value=""></option>
                            <option value="un">UN</option>
                            <option value="cx">Caixa</option>
                            <option value="cx10">Caixa com 10</option>
                            <option value="cx50">Caixa com 50</option>
                            <option value="pct">Pacote</option>
                            <option value="cx100">Caixa com 100</option>
                        </select>
                        <!-- <small id="emailHelp" class="form-text text-muted">Nunca compartilhe seu e-mail com outra pessoa</small> -->
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" step="1" required>
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