<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem de Livros</h1>
            <a href="{{ route('livros.create') }}" class="btn btn-success">Cadastrar Novo Livro</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($livros->isEmpty())
            <div class="alert alert-warning" role="alert">
                Nenhum livro encontrado.
            </div>
        @else
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Número de registro</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->numero_registro }}</td>
                            <td>{{ $livro->titulo }}</td>
                            <td>{{ $livro->autor->nome }}</td>
                            <td>
                                <span class="badge bg-{{ $livro->situacao === 'disponivel' ? 'success' : 'warning' }}">
                                    {{ ucfirst($livro->situacao) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este livro?')">Excluir</button>
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
