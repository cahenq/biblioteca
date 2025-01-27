<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LeitorController;
use Illuminate\Support\Facades\Response;

// Rota de login
Route::get('/', function () {
    return view('pages.livros.login.Login');
})->name('login');

// Rota para listar livros (biblioteca)
Route::get('/biblioteca', [LivroController::class, 'index'])->name('biblioteca');

// Rota para exibir o formulário de edição do livro
Route::get('/editar-livro/{id}', [LivroController::class, 'edit'])->name('editar-livro');

// Rota para salvar edições do livro (atualizar)
Route::put('/editar-livro/{id}', [LivroController::class, 'update'])->name('atualizar-livro');

// Rota para excluir o livro
Route::delete('/excluir-livro/{id}', [LivroController::class, 'destroy'])->name('excluir-livro');

// Rota para a página de empréstimo de livro
Route::get('/emprestimo-livro', function () {
    return view('pages.livros.administrador.emprestimo-livro');
})->name('emprestimo-livro');

// Rota para exibir detalhes de um livro
Route::get('/detalhe-livro/{id}', [LivroController::class, 'detalhes'])->name('detalhe-livro');

// Rota de logout
Route::get('/logout', function () {
    return view('pages.livros.administrador.logout');
})->name('logout');

// Rota para adicionar livro (GET - formulário)
Route::get('/adicionar-livro', function () {
    return view('pages.livros.administrador.adicionar-livro');
})->name('cadastrar-livro');

// Rota para salvar livro (POST - enviar formulário)
Route::post('/adicionar-livro', [LivroController::class, 'store'])->name('livros.store');

// Rotas para leitores
Route::get('/leitores', [LeitorController::class, 'index'])->name('leitores.index'); // Listar leitores

Route::get('/cadastrar-leitor', function () {
    return view('pages.livros.administrador.cadastrar-usuario'); // Página de cadastro de leitor
})->name('cadastrar-leitor');

Route::post('/cadastrar-leitor', [LeitorController::class, 'store'])->name('leitores.store'); // Salvar novo leitor

Route::get('/detalhe-leitor/{id}', [LeitorController::class, 'show'])->name('detalhe-leitor');

// Rota para exibir o formulário de edição de um leitor
Route::get('/leitores/{id}/editar', [LeitorController::class, 'edit'])->name('editar-leitor'); // Formulário de edição de leitor

// Rota para atualizar os dados de um leitor no banco de dados
Route::put('/leitores/{id}', [LeitorController::class, 'update'])->name('leitores.update'); // Atualizar leitor

// Excluir um leitor
Route::delete('/leitores/{id}', [LeitorController::class, 'destroy'])->name('leitores.destroy'); // Excluir leitor
// Rotas para empréstimos e histórico de leitores
Route::get('/leitores/{id}/emprestimo', [LeitorController::class, 'emprestimo'])->name('emprestimo-leitor'); // Página de empréstimos de um leitor

Route::get('/leitores/{id}/historico', [LeitorController::class, 'historico'])->name('historico-emprestimo'); // Histórico de empréstimos de um leitor

// Rota para exibir o formulário de empréstimo de livro
Route::get('/livros/emprestar/{id}', [LivroController::class, 'showEmprestarForm'])->name('livros.emprestar');

// Rota para processar o empréstimo de livro (POST)
Route::post('/livros/emprestar', [LivroController::class, 'emprestarLivro'])->name('livros.emprestar.store');

// Rota para exibir arquivos privados de livros
Route::get('livros/{filename}', function ($filename) {
    $path = storage_path('app/private/livros/' . $filename);
    if (file_exists($path)) {
        return Response::file($path);
    }
    abort(404);
})->name('livros.file');