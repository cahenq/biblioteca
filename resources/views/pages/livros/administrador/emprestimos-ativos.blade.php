@extends('pages.livros.administrador.layoutadm')

@section('title', 'Empréstimos Ativos')

<x-slot name="formulario de empréstimo">
    @yield('title')
</x-slot>

@section('content')
<div class="container">
    <h1>Empréstimos Ativos</h1>
    
    @if($emprestimos->isEmpty())
        <p>Não há empréstimos ativos.</p>
    @else
        <div class="row">
            @foreach($emprestimos as $emprestimo)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $emprestimo->livro->capa }}" alt="Capa do livro" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $emprestimo->livro->titulo }}</h5>
                            <p class="card-text">
                                <strong>Autor:</strong> {{ $emprestimo->livro->autor }} <br>
                                <strong>Data de Entrega:</strong> {{ \Carbon\Carbon::parse($emprestimo->data_entrega)->format('d/m/Y') }} <br>
                                <strong>Data de Devolução:</strong> {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }} 
                            </p>

                            <!-- Botão de status do empréstimo -->
                            <button class="btn {{ $emprestimo->data_devolucao < now() ? 'btn-danger' : 'btn-warning' }} btn-block" 
                                data-emprestimo-id="{{ $emprestimo->id }}" 
                                onclick="atualizarStatus({{ $emprestimo->id }})">
                                {{ $emprestimo->data_devolucao < now() ? 'Pendente' : 'Entregue' }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function atualizarStatus(emprestimoId) {
        fetch(`/emprestimos/atualizar-status/${emprestimoId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                status: 'entregue'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Status do empréstimo atualizado!');
                location.reload(); // Recarrega a página para refletir a mudança
            } else {
                alert('Erro ao atualizar status.');
            }
        });
    }
</script>

@endsection
