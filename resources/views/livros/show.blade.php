<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.menu')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes do Livro</h1>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Título: {{ $livro->titulo }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Número Registro:</strong> {{ $livro->numero_registro }}</p>
                <p><strong>Autor:</strong> {{ $livro->autor->nome }}</p>
                <p><strong>Situação:</strong> 
                    <span class="badge bg-{{ $livro->situacao === 'Disponível' ? 'success' : 'warning' }}">
                        {{ ucfirst($livro->situacao) }}
                    </span>
                </p>
                <p><strong>Gêneros:</strong>
                    @if ($livro->generos->isEmpty())
                        Nenhum gênero associado.
                    @else
                        {{ $livro->generos->pluck('genero')->join(', ') }}
                    @endif
                </p>
                <p><strong>Data de Criação:</strong> {{ $livro->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $livro->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este livro?')">Excluir</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
