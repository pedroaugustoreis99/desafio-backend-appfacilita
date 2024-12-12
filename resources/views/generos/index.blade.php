<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Gêneros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem de Gêneros</h1>
            <a href="{{ route('generos.create') }}" class="btn btn-success">Cadastrar Novo Gênero</a>
        </div>

        @if ($generos->isEmpty())
            <div class="alert alert-warning" role="alert">
                Nenhum gênero encontrado.
            </div>
        @else
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->genero }}</td>
                            <td>{{ $genero->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('generos.destroy', $genero->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este gênero?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
