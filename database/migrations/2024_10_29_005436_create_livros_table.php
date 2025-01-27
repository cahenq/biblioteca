<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->text('descricao');
            $table->string('editora');
            $table->date('publicacao_data');
            $table->string('isbn', 13);
            $table->string('localizacao')->nullable();
            $table->integer('paginas');
            $table->string('genero');
            $table->string('idioma');
            $table->string('image_path')->nullable(); // Para imagem da capa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
