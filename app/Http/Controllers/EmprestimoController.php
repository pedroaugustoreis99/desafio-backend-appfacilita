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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprestimos.create', [
            'usuarios' => Usuario::all(),
            'livros' => Livro::where('situacao', 'Disponível')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmprestimoRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmprestimoRequest $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
