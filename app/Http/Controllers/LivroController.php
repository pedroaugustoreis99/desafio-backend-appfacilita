<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Autor;
use App\Models\Genero;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livros.index', ['livros' => Livro::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dados = [
            'autores' => Autor::all(),
            'generos' => Genero::all()
        ];

        return view('livros.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivroRequest $request)
    {
        $livro = Livro::create([
            'titulo' => $request->titulo,
            'autor_id' => $request->autor_id,
            'numero_registro' => $request->numero_registro,
            'situacao' => 'Disponível'
        ]);
        $livro->generos()->attach($request->generos);
        
        return redirect()->route('livros.show', ['livro' => $livro]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        return view('livros.show', ['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        return view('livros.edit', [
            'livro' => $livro,
            'autores' => Autor::all(),
            'generos' => Genero::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $livro->fill([
            'titulo' => $request->titulo,
            'autor_id' => $request->autor_id,
            'numero_registro' => $request->numero_registro
        ]);
        $livro->save();
        /*
         *  Aceita um array de id's para salvar na tabela intermediária
         *  qualquer id's que não estiver no array será removido da tabela intermediaria
         */
        $livro->generos()->sync($request->generos);

        return redirect()->route('livros.show', ['livro' => $livro]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->generos()->detach($livro->generos->pluck('id')->toArray());
        $livro->delete();

        return redirect()->route('livros.index');
    }
}