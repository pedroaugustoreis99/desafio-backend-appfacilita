<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneroRequest;
use App\Http\Requests\UpdateGeneroRequest;
use App\Models\Genero;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('generos.index', ['generos' => Genero::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneroRequest $request)
    {
        $genero = Genero::create($request->validated());

        return redirect()->route('generos.show', ['genero' => $genero]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        return view('generos.show', ['genero' => $genero]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit', ['genero' => $genero]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneroRequest $request, Genero $genero)
    {
        $genero->fill($request->validated());
        $genero->save();

        return redirect()->route('generos.show', ['genero' => $genero]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('generos.index');
    }
}
