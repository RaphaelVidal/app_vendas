<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    function index()
    {
        $usuarios = Usuarios::all();
        // dd($usuarios[0]->_id);
        return view('usuarios')->with('usuarios', $usuarios);
    }

    function gravarUsuario(Request $request)
    {
        $inputs = $request->all();
        try {
            $novoUsuario = new Usuarios;
            $novoUsuario->name = $inputs['name'];
            $novoUsuario->email = $inputs['email'];
            $novoUsuario->password = Hash::make($inputs['password']);
            $novoUsuario->perfil = $inputs['perfil'];
            $novoUsuario->save();

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
