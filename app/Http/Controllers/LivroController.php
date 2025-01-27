<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function store(Request $request)
    {
        // validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'required',
            'editora' => 'required|max:255',
            'publicacao_data' => 'required|date', 
            'isbn' => 'required|numeric|digits:13',
            'localizacao' => 'required|max:255',
            'paginas' => 'required|numeric',
            'genero' => 'required|max:255',
            'idioma' => 'required|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // validação da imagem (até 20 mb)
        ]);

        // armazenar a imagem, se houver
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('livros', 'public'); // salva na storage/app/public/livros
        }
        
        // salvar os dados do livro no banco de dados
        $livro = Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora' => $request->editora,
            'publicacao_data' => $request->publicacao_data,
            'isbn' => $request->isbn,
            'localizacao' => $request->localizacao,
            'paginas' => $request->paginas,
            'genero' => $request->genero,
            'idioma' => $request->idioma,
            'image_path' => $imagePath
        ]);

        // redirecionar para a tela de biblioteca com o livro recém-adicionado
        return redirect()->route('biblioteca')->with('livro_adicionado', $livro);
    }

    public function detalhes($id)
    {
        $livro = Livro::findOrFail($id); // busca o livro no banco de dados ou retorna 404 se não encontrado
        return view('pages.livros.administrador.detalhe-livro', compact('livro')); // passa o livro para a view
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id); // Busca o livro pelo ID ou retorna 404
        return view('pages.livros.administrador.editar-livro', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        // Validação dos dados
        $request->validate([
            'titulo' => 'nullable|max:255',
            'autor' => 'nullable|max:255',
            'descricao' => 'nullable',
            'editora' => 'nullable|max:255',
            'publicacao_data' => 'nullable|date',
            'isbn' => 'nullable|numeric|digits:13',
            'localizacao' => 'nullable|max:255',
            'paginas' => 'nullable|numeric',
            'genero' => 'nullable|max:255',
            'idioma' => 'nullable|max:255',
        ]);

        // Atualizando os dados do livro
        $livro->update($request->all());

        // Processa o upload da imagem, se houver
        if ($request->hasFile('image_path')) {
            // Armazena a imagem e obtém o caminho
            $path = $request->file('image_path')->store('livros', 'public');

            // Atualiza o caminho da imagem no banco de dados
            $livro->image_path = $path;
        }

        // Salva as alterações no banco de dados
        $livro->save();

        // Redireciona para a página de detalhes do livro
        return redirect()->route('detalhe-livro', ['id' => $livro->id])->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
{
    $livro = Livro::findOrFail($id); // Isso garante que, se não encontrado, um erro 404 será gerado
    $livro->delete();

    return redirect()->route('biblioteca')->with('success', 'Livro deletado com sucesso!');
}


    public function index()
    {
        $livros = Livro::orderBy('created_at', 'desc')->get(); // ordenação do mais recente para o mais antigo
        $livroAdicionado = session('livro_adicionado'); // pega o livro adicionado, se houver
        return view('pages.livros.administrador.biblioteca', compact('livros', 'livroAdicionado'));
    }
}
