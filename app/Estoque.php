<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Estoque extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'estoque';
    
    protected $fillable = [
        'idItem', 'unidadeMedida','quantidade'
    ];
}
