<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Venda extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'venda';
    
    protected $fillable = [
        'idCliente','nomeCliente', 'idItem','nomeItem','quantidade','valorTotal','dataVenda'
    ];
}
