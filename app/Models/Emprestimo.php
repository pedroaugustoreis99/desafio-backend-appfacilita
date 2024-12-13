<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $fillable = ['usuario_id', 'livro_id', 'dt_limite_devolucao', 'dt_devolucao'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function livro(): BelongsTo
    {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }
}
