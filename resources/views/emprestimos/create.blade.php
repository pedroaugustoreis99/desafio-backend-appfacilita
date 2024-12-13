<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empréstimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Cadastrar Empréstimo</h1>
            <a href="{{ route('emprestimos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuário</label>
                <select 
                    id="usuario_id" 
                    name="usuario_id" 
                    class="form-control @error('usuario_id') is-invalid @enderror" 
                    required>
                    <option value="">Selecione um usuário</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nome }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="livro_id" class="form-label">Livro</label>
                <select 
                    id="livro_id" 
                    name="livro_id" 
                    class="form-control @error('livro_id') is-invalid @enderror" 
                    required>
                    <option value="">Selecione um livro</option>
                    @foreach ($livros as $livro)
                        <option value="{{ $livro->id }}" {{ old('livro_id') == $livro->id ? 'selected' : '' }}>
                            {{ $livro->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('livro_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dt_limite_devolucao" class="form-label">Data Limite de Devolução</label>
                <input 
                    type="date" 
                    id="dt_limite_devolucao" 
                    name="dt_limite_devolucao" 
                    class="form-control @error('dt_limite_devolucao') is-invalid @enderror" 
                    value="{{ old('dt_limite_devolucao') }}" 
                    required>
                @error('dt_limite_devolucao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dt_devolucao" class="form-label">Data de Devolução</label>
                <input 
                    type="date" 
                    id="dt_devolucao" 
                    name="dt_devolucao" 
                    class="form-control @error('dt_devolucao') is-invalid @enderror" 
                    value="{{ old('dt_devolucao') }}">
                @error('dt_devolucao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('emprestimos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
