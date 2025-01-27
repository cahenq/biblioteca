@extends('pages.livros.administrador.layoutadm')
@section('title', 'Cadastrar Leitor')

<x-slot name="Cadastrar Leitor">
    @yield('title')
</x-slot>

@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Caixa de pull-up -->
            <div class="pull-up">
                <hr>
                <h1 class="text-left">Cadastrar Leitor</h1>
                <!-- Dividindo o formulário em duas colunas -->
                <form action="{{ route('leitores.store') }}" method="POST" id="form-cadastro-leitor">
                    @csrf
                    <div class="row">
                        <!-- Coluna Esquerda -->
                        <div class="col-md-6 col-left">
                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ old('nome_completo') }}" required>
                                @error('nome_completo') 
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="numero_matricula" class="form-label">Número de Matrícula</label>
                                <input type="text" class="form-control" id="numero_matricula" name="numero_matricula" value="{{ old('numero_matricula') }}" required>
                                @error('numero_matricula') 
                                    <div class="text-danger">{{ $message }}</div>  <!-- Exibe a mensagem personalizada -->
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email') 
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                        <!-- Coluna Direita -->
                        <div class="col-md-6 col-right">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Série</label>
                                <input type="number" class="form-control" id="serie" name="serie" value="{{ old('serie') }}" required>
                                @error('serie') 
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="turma" class="form-label">Turma</label>
                                <select class="form-select" id="turma" name="turma" required>
                                    @foreach (range('A', 'Z') as $letra)
                                        <option value="{{ $letra }}" {{ old('turma') == $letra ? 'selected' : '' }}>{{ $letra }}</option>
                                    @endforeach
                                </select>
                                @error('turma') 
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" id="turno" name="turno" required>
                                    <option value="Matutino" {{ old('turno') == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                    <option value="Vespertino" {{ old('turno') == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                                    <option value="Noturno" {{ old('turno') == 'Noturno' ? 'selected' : '' }}>Noturno</option>
                                </select>
                                @error('turno') 
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                
                    <!-- Telefone e Endereço -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}">
                            </div>
                        </div>
                    </div>
                
                    <!-- Botões -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn custom-btn mt-3">Cadastrar</button>
                            <a href="{{ route('leitores.index') }}" class="btn btn-dark mt-3">Alunos</a>
                        </div>
                    </div>
                </form>
                
                
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('form-cadastro-leitor').addEventListener('submit', function(event) {
            const inputs = document.querySelectorAll('#form-cadastro-leitor .form-control');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('border-danger');
                } else {
                    input.classList.remove('border-danger');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@endpush

@endsection
