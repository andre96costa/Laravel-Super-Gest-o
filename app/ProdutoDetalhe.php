<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = [
        'produto_id',	
        'comprimento',
        'largura',
        'altura',
        'unidade_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class,'produto_id', 'id');
    }
}