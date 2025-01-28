@extends('pages.livros.administrador.layoutadm')
@section('title', 'Formulário de Empréstimo')
<x-slot name="formulario de empréstimo">
    @yield('title')
</x-slot>
@section('content')
<div class="container">
    <h2>Formulário de Empréstimo</h2>

    <!-- Informações do Livro -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $livro->titulo }}</h5>
            <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
        </div>
    </div>

    <!-- Datas -->
    <div class="mb-4">
        <label for="data_entrega" class="form-label">Data de Entrega</label>
        <input type="date" id="data_entrega" class="form-control" onchange="calcularDataDevolucao()">

        <label for="data_devolucao" class="form-label mt-3">Data de Devolução</label>
        <input type="text" id="data_devolucao" class="form-control" readonly>
    </div>

    <!-- Pesquisa de Leitor -->
    <div class="mb-4">
        <label for="pesquisa_leitor" class="form-label">Pesquisar Leitor</label>
        <div class="d-flex">
            <input type="text" id="pesquisa_leitor" class="form-control me-2" placeholder="Digite o nome completo ou número da matrícula" oninput="pesquisarLeitor()">
            <button class="btn btn-primary" onclick="pesquisarLeitor()">Pesquisar</button>
        </div>
    </div>

    <!-- Tabela de Leitores -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Número da Matrícula</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody id="tabela_leitores">
            <!-- Os resultados da pesquisa aparecerão aqui -->
        </tbody>
    </table>

    <!-- Botões de Ação -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('emprestimos.buscar-livro') }}" class="btn btn-secondary">Voltar</a>
        <button id="botao_salvar" class="btn btn-success" onclick="salvarEmprestimo(event)">Salvar</button>
    </div>
    
</div>

<script>
    
function pesquisarLeitor() {
    const query = document.getElementById('pesquisa_leitor').value.trim().toLowerCase();

    if (!query) {
        document.getElementById('tabela_leitores').innerHTML = ''; // limpa a tabela se o campo estiver vazio
        return;
    }

    fetch(`/emprestimos/pesquisar-leitor?query=${query}`)
        .then(response => response.json())
        .then(data => {
            const tabela = document.getElementById('tabela_leitores');
            tabela.innerHTML = '';

            data.forEach(leitor => {
                // Verifica se o nome ou matrícula começa com a consulta
                if (leitor.nome_completo.toLowerCase().startsWith(query) || leitor.numero_matricula.toString().startsWith(query)) {
                    tabela.innerHTML += `
                        <tr>
                            <td>${leitor.nome_completo}</td>
                            <td>${leitor.numero_matricula}</td>
                            <td>
                                <button class="btn btn-primary" onclick="selecionarLeitor(this, ${leitor.id})" data-leitor-id="${leitor.id}">
                                    Selecionar
                                </button>
                            </td>
                        </tr>
                    `;
                }
            });
        });
}


function selecionarLeitor(botao, leitorId) {
    const botaoSalvar = document.getElementById('botao_salvar');
    
    // Verifica se o botão já está selecionado
    if (botao.innerText === 'Selecionado') {
        botao.classList.remove('btn-success');
        botao.classList.add('btn-primary');
        botao.innerText = 'Selecionar';
        botaoSalvar.setAttribute('data-leitor-id', ''); // Desvincula o ID do leitor
        botaoSalvar.innerText = 'Salvar'; // Muda o texto para 'Salvar'
    } else {
        // Marca o botão como selecionado
        document.querySelectorAll('button[data-leitor-id]').forEach(b => {
            b.classList.remove('btn-success');
            b.classList.add('btn-primary');
            b.innerText = 'Selecionar';
        });

        botao.classList.remove('btn-primary');
        botao.classList.add('btn-success');
        botao.innerText = 'Selecionado';

        botaoSalvar.setAttribute('data-leitor-id', leitorId);
        botaoSalvar.innerText = 'Salvar'; // Mantenha o texto de salvar
    }
}

function salvarEmprestimo(event) {
    event.preventDefault(); // Previne o comportamento padrão do formulário

    const dataEntrega = document.getElementById('data_entrega').value;
    const dataDevolucao = document.getElementById('data_devolucao').value;
    const leitorId = document.getElementById('botao_salvar').getAttribute('data-leitor-id');

    if (!dataEntrega || !leitorId || !dataDevolucao) {
        alert('Preencha todos os campos antes de salvar.');
        return;
    }

    // Adicionando o token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Verifique os dados antes de enviar
    console.log({
        leitor_id: leitorId,
        livro_id: {{ $livro->id }},
        data_entrega: dataEntrega,
        data_devolucao: dataDevolucao
    });

    fetch("{{ route('livros.emprestar.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Certifique-se de que o token CSRF está sendo enviado
        },
        body: JSON.stringify({
            leitor_id: leitorId,
            livro_id: {{ $livro->id }},
            data_entrega: dataEntrega,
            data_devolucao: dataDevolucao
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '/emprestimos/ativos'; // Redireciona para a página de empréstimos ativos
        } else {
            console.log(data); // Verifique o que está sendo retornado
            alert('Erro ao salvar empréstimo.');
        }
    })
    .catch(error => {
        console.error(error);
        alert('Erro ao salvar empréstimo. Tente novamente mais tarde.');
    });
}

function calcularDataDevolucao() {
    const dataEntrega = document.getElementById('data_entrega').value;

    if (dataEntrega) {
        const data = new Date(dataEntrega);
        data.setDate(data.getDate() + 7); // Adiciona 7 dias

        const dia = String(data.getDate()).padStart(2, '0');
        const mes = String(data.getMonth() + 1).padStart(2, '0'); // Meses começam de 0
        const ano = data.getFullYear();

        document.getElementById('data_devolucao').value = `${dia}/${mes}/${ano}`;
    }
}

// Garantir que a função seja chamada sempre que o valor da data de entrega mudar
document.getElementById('data_entrega').addEventListener('change', calcularDataDevolucao);


</script>
@endsection
