<head>
    <title>Lista de Livros</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #1a1a1a;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }

        th {
            background-color: #333;
            font-weight: bold;
        }

        .btn-group {
            margin-bottom: 10px;
        }

        .btn-group .btn {
            margin-right: 10px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }

        .special-effects {
            position: relative;
            perspective: 800px;
        }

        .special-effects img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .special-effects .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, #000000, #1a1a1a);
            opacity: 0.8;
            z-index: 1;
        }

        .special-effects .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 40px;
        }

        .special-effects h2 {
            margin-top: 0;
            font-size: 36px;
            color: #fff;
        }

        .special-effects p {
            font-size: 18px;
            color: #ccc;
        }
    </style>

    <script>
        // Exemplo de efeito JavaScript para a página
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.querySelector('.special-effects .overlay');

            // Efeito de fade in no overlay
            overlay.style.opacity = '0';
            setTimeout(function() {
                overlay.style.opacity = '0.8';
            }, 500);

            // Função para exibir o pop-up de confirmação ao clicar no botão "Excluir"
            var btnExcluir = document.getElementById('btexc');
            btnExcluir.addEventListener('click', function(event) {
                var confirmacao = confirm("Deseja realmente excluir o livro?");
                if (!confirmacao) {
                    event.preventDefault(); // Cancela o envio do formulário de exclusão
                }
            });
        });
    </script>
</head>

<h1>Lista de Livros</h1>
<div class="special-effects">
    <img src="/img/biblioteca.jpg" alt="Imagem de fundo" />
    <div class="overlay"></div>
    <div class="content">
        <h2>Bem-vindo à nossa biblioteca!</h2>
        <p>Aqui você encontrará uma incrível seleção de livros.</p>
        <a href="{{ route('livros.create') }}" class="btn btn-primary">Novo Livro</a>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($livros as $livro)
            <tr>
                <td>{{ $livro->titulo }}</td>
                <td>
                    @if ($livro->autores->count() > 0)
                        @foreach ($livro->autores as $autor)
                            {{ $autor->nome }}
                        @endforeach
                    @else
                        Autor desconhecido
                    @endif
                </td>
                <td>{{ $livro->editora->nome }}</td>
                <td>
                    <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info">Detalhes</a>
                    <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button id="btexc" type="submit" class="btn btn-danger btn-excluir">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
