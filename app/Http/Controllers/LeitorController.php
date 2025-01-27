<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use Illuminate\Http\Request;

class LeitorController extends Controller
{
    // Exibir todos os leitores
    public function index(Request $request)
    {
        $query = Leitor::query();

        // Filtro de pesquisa
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nome_completo', 'like', $request->search . '%')
                  ->orWhere('numero_matricula', 'like', '%' . $request->search . '%');
        }

        // Filtro de ordenação
        if ($request->has('order')) {
            switch ($request->order) {
                case 'alphabetical':
                    $query->orderBy('nome_completo', 'asc');
                    break;
                case 'recent':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                default:
                    $query->orderBy('nome_completo', 'asc'); // Padrão: ordem alfabética
                    break;
            }
        }

        $leitores = $query->paginate(10); // 10 registros por página
        return view('pages.livros.administrador.alunos', compact('leitores'));
    }

    // Exibir o formulário de cadastro
    public function create()
    {
        return view('pages.livros.administrador.cadastrar-usuario');
    }

    // Salvar um novo leitor no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'numero_matricula' => 'required|numeric|unique:leitores,numero_matricula',
            'email' => 'required|email|unique:leitores,email',
            'telefone' => 'nullable|string|max:15',
            'serie' => 'required|integer|min:1',
            'turma' => 'required|string|size:1',
            'turno' => 'required|in:Matutino,Vespertino,Noturno',
            'endereco' => 'nullable|string|max:255',
        ], [
            'numero_matricula.unique' => 'Este número de matrícula já está cadastrado.',
            'email.unique' => 'Este endereço de e-mail já está cadastrado.',
            // Adicione outras mensagens personalizadas conforme necessário
        ]);

        // Criar o novo leitor
        Leitor::create($request->all());

        return redirect()->route('leitores.index')->with('success', 'Leitor cadastrado com sucesso!');
    }

    // Exibir os detalhes de um leitor específico
    public function show($id)
    {
        $leitor = Leitor::findOrFail($id);
        return view('pages.livros.administrador.detalhe-leitor', compact('leitor'));
    }

    // Exibir o formulário de edição de um leitor
    public function edit($id)
    {
        $leitor = Leitor::findOrFail($id);
        return view('pages.livros.administrador.editar-leitor', compact('leitor'));
    }

    // Atualizar os dados de um leitor no banco de dados
    public function update(Request $request, $id)
{
    $leitor = Leitor::findOrFail($id);

    // Validação dos dados
    $validatedData = $request->validate([
        'nome_completo' => 'required|string|max:255',
        'numero_matricula' => 'required|numeric|unique:leitores,numero_matricula,' . $id,
        'email' => 'required|email|unique:leitores,email,' . $id,
        'telefone' => 'nullable|string|max:15',
        'serie' => 'required|integer|min:1',
        'turma' => 'required|string|size:1',
        'turno' => 'required|in:Matutino,Vespertino,Noturno',
        'endereco' => 'nullable|string|max:255',

        
    ]);

    // Atualizar o leitor
    $leitor->update($validatedData);

    // Redirecionar para a página de detalhes do leitor com mensagem de sucesso
    return redirect()->route('detalhe-leitor', $leitor->id)->with('success', 'Leitor atualizado com sucesso!');
}
    // Excluir um leitor do banco de dados
    public function destroy($id)
    {
        $leitor = Leitor::findOrFail($id);
        $leitor->delete();

        return redirect()->route('leitores.index')->with('success', 'Leitor excluído com sucesso!');
    }
}
