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
        Schema::create('contato_respostas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contato_id')->constrained()->onDelete('cascade');
            $table->text('mensagem_resposta');
            $table->string('nome_administrador');
            $table->string('tipo_administrador');
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
        Schema::dropIfExists('contato_respostas');
    }
};
