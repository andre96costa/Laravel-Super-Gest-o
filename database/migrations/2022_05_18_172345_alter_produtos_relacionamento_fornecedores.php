<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {

            $idPadrao = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrao SG',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => "contato@fornecedorpadrao.com.br"
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($idPadrao);
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produto_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
