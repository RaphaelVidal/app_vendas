<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Itens;

class VendaController extends Controller
{
    function index()
    {
        $vendas = Venda::all();
        // dd($usuarios[0]->_id);
        return view('vendas')->with('vendas', $vendas);
    }

    function compra()
    {
        $itens = Itens::all();
        return view('compra')->with('itens',$itens);
    }

    function gravarVenda(Request $request)
    {
        $inputs = $request->all();
        try {
            $novaVenda = new Venda;
            $novaVenda->idCliente = $inputs['idCliente'];
            $novaVenda->nomeCliente = $inputs['nomeCliente'];
            $novaVenda->idItem =  $inputs['idItem'];
            $novaVenda->nomeItem = $inputs['nomeItem'];
            $novaVenda->quantidade =  $inputs['quantidade'];
            $novaVenda->valorTotal = $inputs['valorTotal'];
            $novaVenda->dataVenda = now();
            $novaVenda->save();

            session()->flash(
                'msgConfirmaAcao',
                [
                    "snExibir" => true,
                    "tipo" => "success",
                    "titulo" => "Sucesso!",
                    "texto" => "Ação realizada com sucesso"
                ]
            );
             return redirect()->route('usuarios.index');
        
        } catch (\Throwable $th) {
            // throw $th;
            session()->flash(
                'msgConfirmaAcao',
                [
                    "snExibir" => true,
                    "tipo" => "error",
                    "titulo" => "Erro!",
                    "texto" => "Ação não realizada."
                ]
            );
            return redirect()->route('usuarios.index');
        }

    }
}
