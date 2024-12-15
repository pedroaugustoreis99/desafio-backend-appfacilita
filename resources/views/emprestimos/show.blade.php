<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Empréstimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.menu')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes do Empréstimo</h1>
            <a href="{{ route('emprestimos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Empréstimo ID: {{ $emprestimo->id }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Usuário:</strong> {{ $emprestimo->usuario->nome }}</p>
                <p><strong>Livro:</strong> {{ $emprestimo->livro->titulo }}</p>
                <p><strong>Data Limite de Devolução:</strong> {{ $emprestimo->dt_limite_devolucao->format('d/m/Y') }}</p>
                <p><strong>Data de Devolução:</strong> 
                    {{ $emprestimo->dt_devolucao ? $emprestimo->dt_devolucao->format('d/m/Y') : 'Ainda não devolvido' }}
                </p>

                <p>
                    <strong>Status:</strong> 
                    @if ($emprestimo->dt_devolucao)
                        @if ($emprestimo->dt_devolucao > $emprestimo->dt_limite_devolucao)
                            <span class="badge bg-danger">Atrasado</span>
                        @else
                            <span class="badge bg-success">Devolvido</span>
                        @endif
                    @else
                        @if (\Carbon\Carbon::now() > $emprestimo->dt_limite_devolucao)
                            <span class="badge bg-warning">Atrasado</span>
                        @else
                            <span class="badge bg-primary">Pendente</span>
                        @endif
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('emprestimos.destroy', $emprestimo->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este empréstimo?')">Excluir</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
