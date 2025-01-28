@extends('pages.livros.administrador.layoutadm')
@section('title', 'Empréstimo de Livro')
@section('content')

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6 text-left">Empréstimo de Livro</h1>

    <!-- Formulário de pesquisa -->
    <form action="{{ route('emprestimos.buscar-livro') }}" method="GET" class="d-flex w-100 mb-5">
        <input 
            type="text" 
            name="query" 
            class="form-control me-1" 
            placeholder="Pesquisar por ISBN ou Título" 
            value="{{ request('query') }}"
        >
        <button 
            type="submit" 
            class="btn btn-dark text-white"
        >
            Pesquisar
        </button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button 
                class="btn btn-secondary dropdown-toggle" 
                type="button" 
                id="filterDropdown" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
            >
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="{{ route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => '']) }}">Todos</a></li>
                <li><a class="dropdown-item" href="{{ route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => 'disponível']) }}">Disponíveis</a></li>
                <li><a class="dropdown-item" href="{{ route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => 'indisponível']) }}">Indisponíveis</a></li>
            </ul>
        </div>
    </form>
    
    <!-- Lista de livros -->
    <div class="space-y-2">
        @forelse($livros as $livro)
        <div class="card-emprestimo">
            <!-- Capa -->
            <img 
                src="{{ $livro->image_path ? asset('storage/' . $livro->image_path) : asset('images/default-image.jpg') }}"
                alt="capa do livro" 
                class="w-24 h-32 object-cover rounded-md"
            >

            <!-- Detalhes -->
            <div class="details ml-6 flex-grow">
                <h2 class="text-xl font-semibold">{{ $livro->titulo }}</h2>
                <p class="text-gray-600">Autor: {{ $livro->autor }}</p>
                <p class="text-sm text-gray-500 mt-2">Status: 
                    <span class="{{ $livro->status === 'Disponível' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $livro->status }}
                    </span>
                </p>
            </div>

            <!-- Botão de empréstimo -->
            <div>
                @if($livro->status === 'Disponível')
                <a 
                    href="{{ route('livros.emprestar', $livro->id) }}" 
                    class="button-emprestimo available text-decoration-none"
                >
                    Emprestar
                </a>
                @else
                <button 
                    type="button" 
                    onclick="livroIndisponivelModal()" 
                    class="button-emprestimo unavailable"
                >
                    Indisponível
                </button>
                @endif
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500">Nenhum livro encontrado.</p>
        @endforelse
    </div>

    <!-- Paginação -->
    <div class="mt-6">
        {{ $livros->links() }}
    </div>
</div>

<!-- Modal de aviso -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function livroIndisponivelModal() {
        Swal.fire({
            icon: 'error',
            title: 'livro indisponível',
            text: 'este livro não está disponível para empréstimo no momento.',
            confirmButtonText: 'voltar',
            timer: 3000 // fechar após 3 segundos
        });
    }
</script>

@endsection
