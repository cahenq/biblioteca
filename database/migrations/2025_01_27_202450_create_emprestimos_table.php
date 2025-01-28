<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('emprestimos', function (Blueprint $table) {
        $table->id(); // id do empréstimo
        $table->unsignedBigInteger('leitor_id'); // matrícula do aluno
        $table->unsignedBigInteger('livro_id'); // id do livro (relacionado pelo ISBN ou título)
        $table->date('data_entrega'); // data limite de entrega
        $table->date('data_devolucao'); // data real de devolução
        $table->timestamps(); // criado em e atualizado em

        // relacionamentos
        $table->foreign('leitor_id')->references('id')->on('leitores')->onDelete('cascade');
        $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
