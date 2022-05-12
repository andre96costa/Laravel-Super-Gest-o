<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Forma 1
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->save();

        //Forma 2 (necessario o atributo fillable na classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'email' => 'contato@fornecedor200.com.br',
            'uf' => 'RS',
        ]);

        //Forma 3 - com a classe DB
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'email' => 'contato@fornecedor300.com.br',
            'uf' => 'SP',
        ]);
    }
}
