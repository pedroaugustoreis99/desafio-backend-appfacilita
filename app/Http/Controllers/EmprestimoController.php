<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmprestimoRequest;
use App\Http\Requests\UpdateEmprestimoRequest;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Usuario;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('emprestimos.index', ['emprestimos' => Emprestimo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprestimos.create', [
            'usuarios' => Usuario::all(),
            'livros' => Livro::where('situacao', Livro::DISPONIVEL)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmprestimoRequest $request)
    {
        $emprestimo = Emprestimo::create([
            'usuario_id' => $request->usuario_id,
            'livro_id' => $request->livro_id,
            'dt_limite_devolucao' => $request->dt_limite_devolucao,
            'dt_devolucao' => isset($request->dt_devolucao) ? $request->dt_devolucao : null,
        ]);

        if ($emprestimo->dt_devolucao == null) {
            $emprestimo->livro->situacao = Livro::EMPRESTADO;
        } else {
            $emprestimo->livro->situacao = Livro::DISPONIVEL;
        }
        $emprestimo->livro->save();
        
        return redirect()->route('emprestimos.show', ['emprestimo' => $emprestimo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        return view('emprestimos.show', ['emprestimo' => $emprestimo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        return view('emprestimos.edit', [
            'emprestimo' => $emprestimo,
            'usuarios' => Usuario::all(),
            'livros' => Livro::where('situacao', Livro::DISPONIVEL)->orWhere('id', $emprestimo->livro->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmprestimoRequest $request, Emprestimo $emprestimo)
    {
        $emprestimo->fill($request->validated());
        !isset($request->dt_devolucao) ? $emprestimo->dt_devolucao = null : $emprestimo->dt_devolucao = $request->dt_devolucao;
        $emprestimo->save();

        if ($emprestimo->dt_devolucao == null) {
            $emprestimo->livro->situacao = Livro::EMPRESTADO;
        } else {
            $emprestimo->livro->situacao = Livro::DISPONIVEL;
        }
        $emprestimo->livro->save();
        
        return redirect()->route('emprestimos.show', ['emprestimo' => $emprestimo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        $livro = $emprestimo->livro;
        $livro->situacao = Livro::DISPONIVEL;
        $livro->save();
        $emprestimo->delete();

        return redirect()->route('emprestimos.index');
    }
}
