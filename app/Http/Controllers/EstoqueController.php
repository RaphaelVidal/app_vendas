<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Itens;

class EstoqueController extends Controller
{
    function index()
    {
        $estoques = Estoque::all();
        // dd($usuarios[0]->_id);
        return view('estoque')->with('estoques', $estoques);
    }
    function gravarEstoque(Request $request)
    {
        $inputs = $request->all();
        $item = Itens::find($inputs['idItem']);
        try {
            $novoEstoque = new Estoque;
            $novoEstoque->idItem = $inputs['idItem'];
            $novoEstoque->nomeItem = $item['nome'];
            $novoEstoque->unidadeMedida = $inputs['unidadeMedida'];
            $novoEstoque->quantidade = $inputs['quantidade'];
            $novoEstoque->save();

            session()->flash(
                'msgConfirmaAcao',
                [
                    "snExibir" => true,
                    "tipo" => "success",
                    "titulo" => "Sucesso!",
                    "texto" => "Ação realizada com sucesso"
                ]
            );
             return redirect()->route('estoque.index');
        
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
            return redirect()->route('estoque.index');
        }

    }
}
