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
}
