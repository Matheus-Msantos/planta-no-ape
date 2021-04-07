<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    function restore() {
      return confirm('Você realmente deseja restaurar esse produto?');
    }
  </script>

  <title>Lixeira de produtos</title>

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  @include('layouts.menu')
  <main class="container pt-1">
    <h1>Lixeira de produtos</h1>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Imagem</td>
            <td>Descrição</td>
            <td>Preço</td>
            <td>Categoria</td>
            <td>Ações</td>
          </tr>
        </thead>

        <tbody>
          @foreach($Products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td><img src="{{ $product->image }}" style="width: 60px;"></td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->category->name }}</td>
              <td>
                <form action="{{ Route('product.restore', $product->id) }}" method="POST" onsubmit="return restore()" class="d-inline">
                  @method('PATCH')
                  @csrf
                  <button type="submit" class="btn btn-success">Resturar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>
</body>
</html>