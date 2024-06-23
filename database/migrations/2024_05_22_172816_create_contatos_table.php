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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeContato',100);
            $table->string('emailContato', 100);
            $table->string('foneContato', 15);
            $table->string('assuntoContato', 100)->default('Contato Site');
            $table->text('mensagemContato');
            $table->boolean('lidoContato')->default(false);
            $table->boolean('favoritoContato')->default(false);
            $table->boolean('removidoContato')->default(false);
            $table->boolean('respondidoContato')->default(false);
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
        Schema::dropIfExists('contatos');
    }
};
