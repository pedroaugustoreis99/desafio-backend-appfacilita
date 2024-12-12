<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autores.index', ['autores' => Autor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
        $autor = Autor::create($request->validated());
        
        return redirect()->route('autor.show', ['autor' => $autor]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return view('autores.show', ['autor' => $autor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        return view('autores.edit', ['autor' => $autor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        $autor->fill($request->validated());
        $autor->save();

        return redirect()->route('autor.show', ['autor' => $autor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autor.index');
    }
}
