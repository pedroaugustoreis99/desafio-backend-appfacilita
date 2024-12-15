<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.menu')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes do Usuário</h1>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuário ID: {{ $usuario->id }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
                <p><strong>Email:</strong> {{ $usuario->email }}</p>
                <p><strong>Data de Criação:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
