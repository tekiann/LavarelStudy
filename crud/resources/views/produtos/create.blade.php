<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastre um novo produto</title>
    </head>
    <body class="container">

        <h1 class="mt-5">Produtos</h1>
        <p>Cadastre e gerencie produtos</p>
        <p><a href="https://8000-aquamarine-wildcat-2hlkb030.ws-us03.gitpod.io/">Produtos</a></p>

        <div class="table-responsive">

            <table class="shadow shadow-md table table-hover table-striped ">
                <thead>
                    <tr class="table-dark">
                        <th>Nome</th>
                        <th>Preço/Uni</th>
                        <th>Custo total</th>
                        <th>Quantidade</th>
                        <th>Salvar/Editar</th>
                        <th>Deletar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="{{ route('registrar_produto') }}" method="POST">
                            @csrf
                            <td><input class="form-control border border-primary " type="text" name="nome"></td>
                            <td><input class="form-control border border-primary" type="text" name="preco"></td>
                            <td><input class="form-control border border-primary" type="text" name="custo" readonly></td>
                            <td><input class="form-control border border-primary" type="text" name="quantidade"></td>
                            <td><button class="btn btn-block btn-success">Salvar</button></td>
                            <td>
                        </form>

                    </tr>
                    @foreach ($produtos as $produto)
                    <tr>

                        <td><input class="form-control" type="text" name="nome" value="{{$produto->nome}}" readonly></td>
                        <td><input class="form-control" type="text" name="preco" value="R${{$produto->preco}}" readonly></td>
                        <td><input class="form-control" type="text" name="custo" value="R${{$produto->custo}}" readonly></td>
                        <td><input class="form-control" type="text" name="quantidade" value="{{$produto->quantidade}}" readonly></td>
                        <td><button data-toggle="collapse" data-target="#update{{$produto->id}}" class="btn btn-warning btn-block">Editar</button></td>
                        <form action="{{ route('delete_produto', ['id' => $produto->id]) }}" method="POST">
                            @csrf
                            <td><button class="btn btn-danger btn-block">Deletar</button></td>
                        </form>
                        <form action="{{ route('update_produto', ['id' => $produto->id]) }}" method="POST">
                        <tr id="update{{$produto->id}}" class="collapse table-primary">
                            @csrf
                            <td><input class="form-control" type="text" name="nome" value="{{$produto->nome}}"></td>
                            <td><input class="form-control" type="text" name="preco" value="{{$produto->preco}}"></td>
                            <td><input class="form-control" type="text" name="custo" value="{{$produto->custo}}" readonly></td>
                            <td><input class="form-control" type="text" name="quantidade" value="{{$produto->quantidade}}"></td>
                            <td><button class="btn btn-success btn-block">Salvar</button></td>
                            <td>

                        </tr>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
</html>
