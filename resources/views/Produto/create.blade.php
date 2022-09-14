<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("produto.store")}}">

            {{-- "@csrf" Serve para aceitar o post. --}}
            @csrf

            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="idHelp" class="form-text text-muted">Não é necessário informar o id.</small>
            </div>
            <div class="form-group">
              <label for="id-input-nome">Nome</label>
              <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="id-input-preco">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Preço">
            </div>
            <div class="form-group">
                <label for="id-select-Tipo-Produtos-id">Tipo</label>
                <select name="Tipo_Produtos_id" class="form-select" id="id-select-Tipo-Produtos-id" aria-label="Selecione um tipo de produto">
                    @foreach($tipoProdutos as $tipoProduto)
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                    @endforeach
                    
                    <option value="2">Suco</option>
                    <option value="3">Cerveja</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id-input-ingrediente">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingrediente" placeholder="Ingredientes">
            </div>
            <div class="form-group">
                <label for="id-input-imagem">URL Imagem</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-imagem" placeholder="URL Imagem">
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{route("produto.index")}}">Voltar</a>
            </div>
          </form>
    </div>
</body>
</html>