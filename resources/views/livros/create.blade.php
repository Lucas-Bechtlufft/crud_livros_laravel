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
        font-size: 28px;
        font-weight: bold;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .btn-primary {
        background-color: #3b9eff;
    }

    .btn-primary:hover {
        background-color: #297acc;
    }

    .btn-secondary {
        background-color: #ffa94d;
    }

    .btn-secondary:hover {
        background-color: #ff8c02;
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

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
</style>
</head>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Novo Livro</h1>
        </div>
        <form action="{{ route('livros.store') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
                <span id="tituloError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="form-control">
                <span id="isbnError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="numpaginas">Número de Páginas:</label>
                <input type="number" name="numpaginas" id="numpaginas" class="form-control">
                <span id="numpaginasError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="numedicao">Número de Edição:</label>
                <input type="number" name="numedicao" id="numedicao" class="form-control">
                <span id="numedicaoError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="anopublicacao">Ano de Publicação:</label>
                <input type="number" name="anopublicacao" id="anopublicacao" class="form-control">
                <span id="anopublicacaoError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="id_editora">Editora:</label>
                <select name="id_editora" id="id_editora" class="form-control">
                    @foreach ($editoras as $editora)
                        <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                    @endforeach
                </select>
                <span id="editoraError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="id_autores">Autores:</label>
                <select name="id_autores[]" id="id_autores" class="form-control" multiple>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
                <span id="autoresError" class="error-message"></span>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Voltar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
    function validateForm() {
        var titulo = document.getElementById("titulo").value;
        var isbn = document.getElementById("isbn").value;
        var numpaginas = document.getElementById("numpaginas").value;
        var numedicao = document.getElementById("numedicao").value;
        var anopublicacao = document.getElementById("anopublicacao").value;
        var id_editora = document.getElementById("id_editora").value;
        var id_autores = document.getElementById("id_autores").value;

        var errors = false;

        if (titulo === "") {
            document.getElementById("tituloError").textContent = "O campo Título deve ser preenchido";
            errors = true;
        } else {
            document.getElementById("tituloError").textContent = "";
        }

        if (isbn === "") {
            document.getElementById("isbnError").textContent = "O campo ISBN deve ser preenchido";
            errors = true;
        } else {
            document.getElementById("isbnError").textContent = "";
        }

        if (numpaginas === "") {
            document.getElementById("numpaginasError").textContent = "O campo Número de Páginas deve ser preenchido";
            errors = true;
        } else {
            document.getElementById("numpaginasError").textContent = "";
        }

        if (numedicao === "") {
            document.getElementById("numedicaoError").textContent = "O campo Número de Edição deve ser preenchido";
            errors = true;
        } else {
            document.getElementById("numedicaoError").textContent = "";
        }

        if (anopublicacao === "") {
            document.getElementById("anopublicacaoError").textContent = "O campo Ano de Publicação deve ser preenchido";
            errors = true;
        } else {
            document.getElementById("anopublicacaoError").textContent = "";
        }

        if (id_editora === "") {
            document.getElementById("editoraError").textContent = "O campo Editora deve ser selecionado";
            errors = true;
        } else {
            document.getElementById("editoraError").textContent = "";
        }

        if (id_autores.length === 0) {
            document.getElementById("autoresError").textContent = "Pelo menos um Autor deve ser selecionado";
            errors = true;
        } else {
            document.getElementById("autoresError").textContent = "";
        }

        return !errors;
    }
</script>
