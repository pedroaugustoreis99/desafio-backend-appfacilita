<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Cadastrar Livro</h1>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <form action="{{ route('livros.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label">Título do Livro</label>
                <input 
                    type="text" 
                    id="titulo" 
                    name="titulo" 
                    class="form-control @error('titulo') is-invalid @enderror" 
                    value="{{ old('titulo') }}" 
                    required>
                @error('titulo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="numero_registro" class="form-label">Número de Registro</label>
                <input 
                    type="text" 
                    id="numero_registro" 
                    name="numero_registro" 
                    class="form-control @error('numero_registro') is-invalid @enderror" 
                    value="{{ old('numero_registro', uniqid()) }}" 
                    required>
                @error('numero_registro')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="autor_id" class="form-label">Autor</label>
                <select 
                    id="autor_id" 
                    name="autor_id" 
                    class="form-control @error('autor_id') is-invalid @enderror" 
                    required>
                    <option value="">Selecione um autor</option>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}" {{ old('autor_id') == $autor->id ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
                @error('autor_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gêneros</label>
                <div>
                    @foreach ($generos as $genero)
                        <div class="form-check">
                            <input 
                                type="checkbox" 
                                id="genero_{{ $genero->id }}" 
                                name="generos[]" 
                                value="{{ $genero->id }}" 
                                class="form-check-input @error('generos') is-invalid @enderror"
                                {{ in_array($genero->id, old('generos', [])) ? 'checked' : '' }}>
                            <label for="genero_{{ $genero->id }}" class="form-check-label">
                                {{ $genero->genero }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('generos')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
                @error('generos.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="alert alert-warning text-center" role="alert">
                Por padrão, a situação do livro será <strong class="text-success">disponível</strong> até que seja realizado um empréstimo.
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>