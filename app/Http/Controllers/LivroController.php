<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Editora;
use App\Models\Autor;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with(['editora', 'autores'])->get();
        return view('livros.index', compact('livros'));
    }


    public function create()
    {
        $editoras = Editora::all(); // Obtém todas as editoras disponíveis
        $autores = Autor::all(); // Obtém todos os autores disponíveis

        return view('livros.create', compact('editoras', 'autores'));
    }


    public function store(Request $request)
    {
        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->isbn = $request->isbn;
        $livro->numpaginas = $request->numpaginas;
        $livro->numedicao = $request->numedicao;
        $livro->anopublicacao = $request->anopublicacao;
        $livro->id_editora = $request->id_editora;
        $livro->save();

        // Processar os autores selecionados
        if ($request->has('id_autores')) {
            $livro->autores()->attach($request->id_autores);
        }

        return redirect()->route('livros.index');
    }


    public function show($id)
    {
        $livro = Livro::with(['editora', 'autores'])->find($id);
        $autor = $livro->autores->first();
        return view('livros.show', compact('livro', 'autor'));
    }

    public function edit($id)
    {
        $livro = Livro::find($id);
        $editoras = Editora::all(); // Buscar todas as editoras disponíveis
        $autores = Autor::all();
        return view('livros.edit', compact('livro', 'editoras', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::find($id);
        $livro->titulo = $request->titulo;
        $livro->isbn = $request->isbn;
        $livro->numpaginas = $request->numpaginas;
        $livro->numedicao = $request->numedicao;
        $livro->anopublicacao = $request->anopublicacao;
        $livro->id_editora = $request->id_editora;
        $livro->autores()->sync($request->id_autores);

        $livro->save();
        return redirect()->route('livros.index');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->autores()->detach();
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso.');
    }
}
