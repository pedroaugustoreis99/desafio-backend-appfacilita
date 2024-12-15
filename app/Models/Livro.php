<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = ['titulo', 'autor_id', 'numero_registro', 'situacao'];
    const EMPRESTADO = "Emprestado";
    const DISPONIVEL = "Disponível";

    /*
     * Relacionamento n para n com a tabela generos
     */
    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class, 'genero_livro', 'livro_id', 'genero_id');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }
}
