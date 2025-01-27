<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeitoresTable extends Migration
{
    /**
     * run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leitores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->integer('numero_matricula')->unique();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->integer('serie');
            $table->char('turma', 1);
            $table->enum('turno', ['Matutino', 'Vespertino', 'Noturno']);
            $table->string('endereco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leitores');
    }
}
