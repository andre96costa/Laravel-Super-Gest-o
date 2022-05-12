<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //trait
    //Permite o uso de metodos
    use SoftDeletes;

    //Informa ao ORM qual o nome da tabela no banco de dados.
    protected $table = 'fornecedores';
    //Informa ao ORM quais dados podem ser preenchidos no banco de dados
    protected $fillable = [
        'nome',
        'site',
        'email',
        'uf'
    ];
}
