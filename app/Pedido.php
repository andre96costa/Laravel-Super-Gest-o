<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class,'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at');
    }
}
