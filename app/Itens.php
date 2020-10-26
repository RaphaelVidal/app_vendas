<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Itens extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'itens';
    
    protected $fillable = [
        'nome', 'descricao','valor'
    ];
}
