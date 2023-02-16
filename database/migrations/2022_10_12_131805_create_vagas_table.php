<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('tipo',15);
            $table->string('area_atuacao', 200);        
            $table->string('remuneracao', 200)->nullable();
            $table->string('contato_email', 200)->nullable();
            $table->string('contato_telefone', 200)->nullable();
            $table->string('contato_link', 1000)->nullable();
            $table->date('data_limite_procura')->nullable();
            $table->text('requisitos')->nullable();
            $table->text('descricao')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('vaga_status', 50);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vagas');
    }
}