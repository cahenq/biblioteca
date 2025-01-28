<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Leitor;
use App\Models\Livro;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmprestimoController extends Controller
{
    // Exibe o formulário de empréstimo de um livro
    public function formularioEmprestimo($id)
    {
        $livro = Livro::findOrFail($id);
        return view('pages.livros.administrador.formulario-emprestimo', compact('livro'));
    }

    // Pesquisa leitores (por nome ou número de matrícula)
    public function pesquisarLeitor(Request $request)
    {
        $query = $request->input('query');

        $leitores = Leitor::where('nome_completo', 'LIKE', "%$query%")
            ->orWhere('numero_matricula', 'LIKE', "%$query%")
            ->get();

        return response()->json($leitores);
    }

    // Processa e salva o empréstimo no banco de dados
    public function salvarEmprestimo(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'leitor_id' => 'required|exists:leitores,id',
            'livro_id' => 'required|exists:livros,id',
            'data_entrega' => 'required|date',
            'data_devolucao' => 'required|date',
        ]);
    
        try {
            // Criação do empréstimo
            $emprestimo = new Emprestimo();
            $emprestimo->leitor_id = $validated['leitor_id'];
            $emprestimo->livro_id = $validated['livro_id'];
            $emprestimo->data_entrega = $validated['data_entrega'];
            $emprestimo->data_devolucao = $validated['data_devolucao'];
            $emprestimo->save();
    
            // Atualizando o status do livro
            Livro::where('id', $validated['livro_id'])->update(['status' => 'Emprestado']);
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    // Exibe a lista de empréstimos ativos
    public function exibirEmprestimosAtivos()
    {
        // Busca os empréstimos ativos
        $emprestimos = Emprestimo::whereNull('data_entregue')->get(); // Empréstimos não entregues ainda

        return view('pages.livros.administrador.emprestimos-ativos', compact('emprestimos'));
    }

    // Confirma a devolução do empréstimo
    public function confirmarEntrega($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);

        // Calcula o status de entrega
        $hoje = Carbon::now();
        $status = $hoje->greaterThan($emprestimo->data_devolucao) ? 'entregue com atraso' : 'entregue no prazo';

        // Atualiza os dados do empréstimo
        $emprestimo->update([
            'data_entregue' => $hoje,
            'status' => $status,
        ]);

        // Atualiza o status do livro para "Disponível"
        $livro = Livro::findOrFail($emprestimo->livro_id);
        $livro->update(['status' => 'Disponível']);

        return response()->json(['message' => 'Entrega confirmada com sucesso!']);
    }

    // Busca livros disponíveis para empréstimo
    public function buscarLivroParaEmprestimo(Request $request)
    {
        $query = $request->input('query');
        $status = $request->input('status', 'Disponível'); // Padrão: apenas livros disponíveis

        $livros = Livro::query();

        if ($query) {
            $livros->where('titulo', 'LIKE', "%$query%")
                ->orWhere('isbn', 'LIKE', "%$query%");
        }

        if ($status) {
            $livros->where('status', $status);
        }

        $livros = $livros->paginate(10);

        return view('pages.livros.administrador.pesquisa-livro', compact('livros'));
    }
}
