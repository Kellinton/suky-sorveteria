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
            $table->string('nomeFuncionario', 255);
            $table->string("emailFuncionario", 255);
            $table->dataNascimento();
            $table->foneFuncionario();
            $table->enderecoFuncionario();
            $table->cidadeFuncionario();
            $table->estadoFuncionario();
            $table->cepFuncionario();
            $table->dataContratacao();
            $table->cargo();
            $table->salario();
            $table->tipoFuncionario();
            $table->statusFuncionario();
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
