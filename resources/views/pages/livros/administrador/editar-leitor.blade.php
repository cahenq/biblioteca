@extends('pages.livros.administrador.layoutadm')
@section('title', 'Editar Leitor')

<x-slot name="Editar Leitor">
    @yield('title')
</x-slot>

@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-up">
                <hr>
                <h1 class="text-left">Editar Leitor</h1>
                <form action="{{ route('leitores.update', $leitor->id) }}" method="POST" id="form-editar-leitor">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Coluna Esquerda -->
                        <div class="col-md-6 col-left">
                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ old('nome_completo', $leitor->nome_completo) }}" required>
                                @error('nome_completo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="numero_matricula" class="form-label">Número de Matrícula</label>
                                <input type="text" class="form-control" id="numero_matricula" name="numero_matricula" value="{{ old('numero_matricula', $leitor->numero_matricula) }}" required>
                                @error('numero_matricula')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $leitor->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone', $leitor->telefone ?? 'Número não informado') }}">
                                @error('telefone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Coluna Direita -->
                        <div class="col-md-6 col-right">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Série</label>
                                <input type="number" class="form-control" id="serie" name="serie" value="{{ old('serie', $leitor->serie) }}" required>
                                @error('serie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="turma" class="form-label">Turma</label>
                                <select class="form-select" id="turma" name="turma" required>
                                    @foreach (range('A', 'Z') as $letra)
                                        <option value="{{ $letra }}" {{ old('turma', $leitor->turma) == $letra ? 'selected' : '' }}>{{ $letra }}</option>
                                    @endforeach
                                </select>
                                @error('turma')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" id="turno" name="turno" required>
                                    <option value="Matutino" {{ old('turno', $leitor->turno) == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                    <option value="Vespertino" {{ old('turno', $leitor->turno) == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                                    <option value="Noturno" {{ old('turno', $leitor->turno) == 'Noturno' ? 'selected' : '' }}>Noturno</option>
                                </select>
                                @error('turno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $leitor->endereco ?? 'Endereço não informado') }}">
                                @error('endereco')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    
                    <!-- Botões -->
<div class="row mt-4">
    <div class="col-md-12 d-flex justify-content-between">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#confirmBackModal">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div>
            <button type="submit" class="btn btn-dark">Salvar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Excluir</button>
        </div>
    </div>
</div>
                </form>

                <!-- Modal de Exclusão -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja excluir este leitor? Esta ação não pode ser desfeita.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('leitores.destroy', $leitor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>                                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal de Voltar -->
                <!-- Modal de Voltar -->
<div class="modal fade" id="confirmBackModal" tabindex="-1" aria-labelledby="confirmBackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmBackModalLabel">Confirmar Voltar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja voltar? As alterações não serão salvas.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="{{ route('detalhe-leitor', $leitor->id) }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection