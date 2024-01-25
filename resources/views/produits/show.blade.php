@extends("layouts.app")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <title>Produit | détails</title>
</head>

<body>
    @section("content")
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if (isset($produit->image) && $produit->image)
                            <img src="{{ asset('ProduitsImages/' . $produit->image) }}" alt="{{ $produit->image }}" class="img-fluid mb-3">
                        @endif

                        <h4 class="text-secondary">Libelle: <span class="text-dark">{{ $produit->libelle }}</span>
                        </h4>
                        <h4 class="text-secondary">Marque: <span class="text-dark">{{ $produit->marque }}</span></h4>
                        <h4 class="text-secondary">Prix: <span class="text-dark">{{ $produit->prix }}</span></h4>
                        <h4 class="text-secondary">Stock: <span class="text-dark">{{ $produit->stock }}</span></h4>
                        <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}"
                            class="btn btn-warning me-2">Modifier</a>
                        <form action="{{ route('produits.destroy', ['produit' => $produit->id]) }}" method="post"
                            class="my-0 d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
