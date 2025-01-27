@extends('pages.livros.administrador.layoutadm')
@section('title', 'Lista de Alunos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('cadastrar-leitor') }}" class="btn btn-dark">
        <i class="fas fa-arrow-left text-white"></i>
    </a>
    <form action="{{ route('leitores.index') }}" method="GET" class="w-50 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar por nome ou matrícula" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Pesquisar</button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'alphabetical']) }}">Ordenar Alfabéticamente</a></li>
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'recent']) }}">Mais Recente</a></li>
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'oldest']) }}">Mais Antigo</a></li>
            </ul>
        </div>
    </form>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Número de Matrícula</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leitores as $leitor)
            <tr>
                <td>{{ $leitor->nome_completo }}</td>
                <td>{{ $leitor->numero_matricula }}</td>
                <td>
                    <a href="{{ route('detalhe-leitor', $leitor->id) }}" class="btn btn-light">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $leitores->links() }}
</div>
@endsection
@extends('pages.livros.administrador.layoutadm')
@section('title', 'Lista de Alunos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('cadastrar-leitor') }}" class="btn btn-dark">
        <i class="fas fa-arrow-left text-white"></i>
    </a>
    <form action="{{ route('leitores.index') }}" method="GET" class="w-50 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar por nome ou matrícula" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Pesquisar</button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'alphabetical']) }}">Ordenar Alfabéticamente</a></li>
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'recent']) }}">Mais Recente</a></li>
                <li><a class="dropdown-item" href="{{ route('leitores.index', ['search' => request('search'), 'order' => 'oldest']) }}">Mais Antigo</a></li>
            </ul>
        </div>
    </form>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Número de Matrícula</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leitores as $leitor)
            <tr>
                <td>{{ $leitor->nome_completo }}</td>
                <td>{{ $leitor->numero_matricula }}</td>
                <td>
                    <a href="{{ route('detalhe-leitor', $leitor->id) }}" class="btn btn-light">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $leitores->links() }}
</div>
@endsection
