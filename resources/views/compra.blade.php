<?php
// dd($usuarios);
?>
@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Compra</h1>
    </div>
        <div class="bg-white p-2">

            <form method="POST" action="{{ route('estoque.gravarEstoque') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Item</label>
                    <!-- <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"> -->
                    <select name="idItem" id="idItem" class="form-control" required onchange="calculaTotal()">
                        <option value="">selecione...</option>
                        @foreach($itens as $item)
                        <option value="{{$item->_id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                    <!-- <small id="emailHelp" class="form-text text-muted">Insira seu primeiro e ultimo nome</small> -->
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" step="1" required onfocusout="calculaTotal()">
                </div>
                <div class="form-group">
                    <label for="valorTotal">Valor Total</label>
                    <input type="number" readonly class="form-control" id="valorTotal" name="valorTotal" min="1" step="1" required>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
</div>

@endsection