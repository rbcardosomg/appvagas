<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('documento', 100);
            $table->string('area_atuacao_empresa', 100);
            $table->string('telefone', 50);
            $table->string('rua', 200);
            $table->string('bairro', 100);
            $table->string('numero', 50);
            $table->string('cidade', 150);
            $table->string('estado', 50);
            $table->timestamps();
        });

        //adicionar o relacionamento com a tabela
        Schema::table('users', function(Blueprint $table) {
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_empresa_id_foreign');
            $table->dropColumn('empresa_id');
        });
        
        Schema::dropIfExists('empresas');
    }
}
