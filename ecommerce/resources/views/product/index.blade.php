<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    function remover() {
      confirm('Você realmente deseja excluir esse produto?');
    }
  </script>

  <title>Lista de produtos</title>

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container p-1">
    <h1>Lista de produtos</h1>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif
    <div class="row">
      <table class="table">

        <thead>
          <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Preço</td>
            <td>Ações</td>
          </tr>
        </thead>

        <tbody>
          @foreach($Products as $product)

            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->price }}</td>
              <td>
                <a href="#" class="btn btn-primary">Visualizar</a>
                <a href="{{ Route('product.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ Route('product.destroy', $product->id) }}" method="POST" onsubmit="remover()" class="d-inline">
                  @method('DELETE')
                  @csrf

                  <button type="submit" class="btn btn-danger">Excluir</button>
                </form>

              </td>
            </tr>

          @endforeach
        </tbody>

      </table>
    </div>

    <a href="{{ Route('product.create') }}" class="btn btn-primary">Cadastrar produto</a>

  </div>
</body>
</html>
