<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itens;


class ItensController extends Controller
{
    function index()
    {
        $itens = Itens::all();
        // dd($usuarios[0]->_id);
        return view('itens')->with('itens', $itens);
    }
    function gravarItem(Request $request)
    {
        $inputs = $request->all();
        try {
            $novoItem = new Itens;
            $novoItem->nome = $inputs['nome'];
            $novoItem->descricao = $inputs['descricao'];
            $novoItem->valor = $inputs['valor'];
            $novoItem->save();

            session()->flash(
                'msgConfirmaAcao',
                [
                    "snExibir" => true,
                    "tipo" => "success",
                    "titulo" => "Sucesso!",
                    "texto" => "Ação realizada com sucesso"
                ]
            );
             return redirect()->route('itens.index');
        
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
            return redirect()->route('itens.index');
        }

    }
    function buscaItens()
    {
        $itens = Itens::all();
        return json_encode($itens);
    }
}
