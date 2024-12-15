<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Desafio back-end app facilita</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="livrosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Livros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="livrosDropdown">
                        <li><a class="dropdown-item" href="{{ route('livros.index') }}">Listar Livros</a></li>
                        <li><a class="dropdown-item" href="{{ route('generos.index') }}">Gêneros</a></li>
                        <li><a class="dropdown-item" href="{{ route('autor.index') }}">Autores</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('emprestimos.index') }}">Empréstimos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
