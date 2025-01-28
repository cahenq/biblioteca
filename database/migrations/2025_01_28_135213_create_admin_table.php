<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); // cria a chave primária
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha'); // aqui armazena o hash da senha
            $table->timestamps(); // cria os campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
