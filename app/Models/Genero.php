<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genero extends Model
{
    protected $table = 'generos';
    protected $fillable = ['genero'];

    /*
     * Relacionamento n para n com a tabela livros
     */
    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'genero_livro', 'genero_id', 'livro_id');
    }
}