<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label class="form-laberl">ID</label>
            <input type="text" class="form-control" value={{$produto->id}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Nome</label>
            <input type="text" class="form-control" value={{$produto->nome}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Preço</label>
            <input type="text" class="form-control" value={{$produto->preco}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Id do tipo de produto</label>
            <input type="text" class="form-control" value={{$produto->Tipo_Produtos_id}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Ingredientes</label>
            <input type="text" class="form-control" value={{$produto->ingredientes}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">URL da Imagem</label>
            <input type="text" class="form-control" value={{$produto->urlImage}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">ID</label>
            <input type="text" class="form-control" value={{$produto->id}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Data da Última Atualização</label>
            <input type="text" class="form-control" value={{$produto->updated_at}} disabled>
        </div>
        <div class="form-group">
            <label class="form-laberl">Data de Criação</label>
            <input type="text" class="form-control" value={{$produto->created_at}} disabled>
        </div>
        <div class="m-3">
            <a href="{{route("produto.index")}}" class="btn btn-outline-primary">Voltar</a>
        </div>
    </div>
    
</body>
</html>