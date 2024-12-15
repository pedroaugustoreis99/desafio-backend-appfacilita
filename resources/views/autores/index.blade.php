<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.menu')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem de Autores</h1>
            <a href="{{ route('autor.create') }}" class="btn btn-success">Cadastrar Novo Autor</a>
        </div>

        @if ($autores->isEmpty())
            <div class="alert alert-warning" role="alert">
                Nenhum autor encontrado.
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
                    @foreach ($autores as $autor)
                        <tr>
                            <td>{{ $autor->id }}</td>
                            <td>{{ $autor->nome }}</td>
                            <td>{{ $autor->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('autor.show', $autor->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('autor.edit', $autor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('autor.destroy', $autor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este autor?')">Excluir</button>
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
