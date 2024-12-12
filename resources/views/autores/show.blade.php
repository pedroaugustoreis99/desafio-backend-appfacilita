<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes do Autor</h1>
            <a href="{{ route('autor.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Autor ID: {{ $autor->id }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Nome do Autor:</strong> {{ $autor->nome }}</p>
                <p><strong>Data de Criação:</strong> {{ $autor->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $autor->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('autor.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('autor.destroy', $autor->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este autor?')">Excluir</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
