<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir um produto</title>
</head>
<body>
    <form action="{{ route('delete_produto', ['id' => $produto->id]) }}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja excluir esse produto?</label>
        <p>{{$produto->nome}}</p>
        <button>Sim</button>
    </form>
</body>
</html>
