<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Gênero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Cadastrar Gênero</h1>
            <a href="{{ route('generos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <form action="{{ route('generos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="genero" class="form-label">Nome do Gênero</label>
                <input 
                    type="text" 
                    id="genero" 
                    name="genero" 
                    class="form-control @error('genero') is-invalid @enderror" 
                    value="{{ old('genero') }}" 
                    required>
                @error('genero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('generos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
