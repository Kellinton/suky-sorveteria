<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nomeFuncionario', 128);
            $table->string('sobrenomeFuncionario', 128);
            $table->string('fotoFuncionario', 255)->nullable();
            $table->string('foneFuncionario', 20);
            $table->string('enderecoFuncionario', 255);
            $table->string('cidadeFuncionario', 100);
            $table->string('estadoFuncionario', 50);
            $table->string('cepFuncionario', 10);
            $table->date('dataNascFuncionario');
            $table->date('dataContratacaoFuncionario')->nullable();
            $table->string('cargoFuncionario', 100);
            $table->decimal('salarioFuncionario', 10, 2);
            $table->enum('tipo_funcionario', ['administrador', 'assistente']);
            $table->enum('statusFuncionario', ['ativo', 'inativo']);
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
        Schema::dropIfExists('funcionarios');
    }
};
