<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.menu')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem de Empréstimos</h1>
            <a href="{{ route('emprestimos.create') }}" class="btn btn-primary">Novo Empréstimo</a>
        </div>

        @if($emprestimos->isEmpty())
            <div class="alert alert-info">
                Não há empréstimos cadastrados.
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Livro</th>
                        <th>Data Limite Devolução</th>
                        <th>Data de Devolução</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->id }}</td>
                            <td>{{ $emprestimo->usuario->nome }}</td>
                            <td>{{ $emprestimo->livro->titulo }}</td>
                            <td>{{ $emprestimo->dt_limite_devolucao->format('d/m/Y') }}</td>
                            <td>
                                @if($emprestimo->dt_devolucao)
                                    {{ $emprestimo->dt_devolucao->format('d/m/Y') }}
                                @else
                                    <span class="text-muted">Ainda não devolvido</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('emprestimos.show', $emprestimo->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('emprestimos.destroy', $emprestimo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir este empréstimo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
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
