@extends("layouts.app")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Produit | détails</title>
</head>
<body>
    @section("content")
    <div class="w-50 my-5 p-5 bg-light mx-auto">
        @if (isset($produit['Image']) && $produit['Image'])
            <img src="/ProduitsImages/{{ $produit['Image'] }}" alt="{{ $produit['Image'] }}">
        @endif
        <h4 class="text-secondary">Libelle : <span class="text-dark">{{ $produit['Libelle'] }}</span></h4>
        <h4 class="text-secondary">Marque : <span class="text-dark">{{ $produit['Marque'] }}</span></h4>
        <h4 class="text-secondary">Prix : <span class="text-dark">{{ $produit['Prix'] }}</span></h4>
        <h4 class="text-secondary">Stock : <span class="text-dark">{{ $produit['Stock'] }}</span></h4>
    </div>
    @endsection
</body>
</html>