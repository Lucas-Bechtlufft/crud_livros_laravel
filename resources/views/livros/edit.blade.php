<head>
    <title>Editar Livro</title>
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

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background-color: #333;
            border-radius: 4px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            margin-bottom: 20px;
        }

        .card-header h1 {
            margin: 0;
            font-size: 24px;
            color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #ccc;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #1a1a1a;
            color: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b9eff;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 10px;
            background-color: #3b9eff;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #297acc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Editar Livro</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('livros.update', $livro->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control"
                            value="{{ $livro->titulo }}">
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" name="isbn" id="isbn" class="form-control"
                            value="{{ $livro->isbn }}">
                    </div>
                    <div class="form-group">
                        <label for="numpaginas">Número de Páginas:</label>
                        <input type="number" name="numpaginas" id="numpaginas" class="form-control"
                            value="{{ $livro->numpaginas }}">
                    </div>
                    <div class="form-group">
                        <label for="numedicao">Número de Edição:</label>
                        <input type="number" name="numedicao" id="numedicao" class="form-control"
                            value="{{ $livro->numedicao }}">
                    </div>
                    <div class="form-group">
                        <label for="anopublicacao">Ano de Publicação:</label>
                        <input type="number" name="anopublicacao" id="anopublicacao" class="form-control"
                            value="{{ $livro->anopublicacao }}">
                    </div>
                    <div class="form-group">
                        <label for="id_editora">Editora:</label>
                        <select name="id_editora" id="id_editora" class="form-control">
                            @foreach ($editoras as $editora)
                                <option value="{{ $editora->id }}" @if ($livro->id_editora == $editora->id) selected @endif>
                                    {{ $editora->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_autores">Autores:</label>
                        <select name="id_autores[]" id="id_autores" class="form-control" multiple>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}" @if (in_array($autor->id, $livro->autores->pluck('id')->toArray())) selected @endif>
                                    {{ $autor->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
