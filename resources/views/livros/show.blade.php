<div class="special-effects">
    <div class="overlay"></div>
    <div class="content">
        <h1>Detalhes do Livro</h1>
        <h2 class="title">Título: {{ $livro->titulo }}</h2>
        <div class="data">
            <p><span class="label">ISBN:</span> {{ $livro->isbn }}</p>
            <p><span class="label">Número de Páginas:</span> {{ $livro->numpaginas }}</p>
            <p><span class="label">Número de Edição:</span> {{ $livro->numedicao }}</p>
            <p><span class="label">Ano de Publicação:</span> {{ $livro->anopublicacao }}</p>
            <p><span class="label">Editora:</span> {{ $livro->editora->nome }}</p>
        </div>
        <div class="authors">
            <p><span class="label">Autores:</span></p>
            <ul>
                @foreach ($livro->autores as $autor)
                    <li>{{ $autor->nome }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</div>

<style>
    body {
        font-family: 'Roboto', Arial, sans-serif;
        background-color: #222;
        color: #fff;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        background-color: #3b9eff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #297acc;
    }

    .btn-primary {
        background-color: #17a2b8;
    }

    .btn-info {
        background-color: #00bcd4;
    }

    .btn-danger {
        background-color: #f44336;
    }

    .special-effects {
        position: relative;
        perspective: 800px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .special-effects .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom right, #000000, #222);
        opacity: 0.9;
        z-index: 1;
    }

    .special-effects .content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 8px;
    }

    .special-effects h1 {
        margin-top: 0;
        font-size: 36px;
        color: #fff;
    }

    .special-effects h2 {
        font-size: 24px;
        color: #fff;
        margin-bottom: 20px;
    }

    .special-effects .data,
    .special-effects .authors {
        margin-bottom: 20px;
    }

    .special-effects .data p,
    .special-effects .authors p {
        margin-bottom: 10px;
    }

    .special-effects .data .label,
    .special-effects .authors .label {
        font-weight: bold;
        color: #17a2b8;
    }

    .special-effects ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
    }

    .special-effects ul li {
        margin-bottom: 5px;
    }
</style>
