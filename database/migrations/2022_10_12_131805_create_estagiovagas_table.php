<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstagiovagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagiovagas', function (Blueprint $table) {
            $table->id();
            $table->string('area_atuacao', 200);        
            $table->string('remuneracao', 200)->nullable();
            $table->string('contato_email', 200)->nullable();
            $table->string('contato_telefone', 200)->nullable();
            $table->string('contato_link', 1000)->nullable();
            $table->date('data_limite_procura')->nullable();
            $table->text('requisitos')->nullable();
            $table->text('descricao')->nullable();
            $table->string('observacoes', 10000)->nullable();
            $table->string('vaga_aprovada',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estagiovagas');
    }
}
