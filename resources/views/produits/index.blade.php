@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Produits</title>
</head>

<body>
    @section("content")
    @if (!$produits || $produits->isEmpty())
        <div class="w-100 my-5">
            <h3 class="text-secondary mx-auto col-4">Pas de produits</h3>
        </div>
    @else
        <table class="table mt-5 table-hover  w-75 mx-auto text-center">
            <tr class="bg-dark text-light">
                <th class="py-3">Libelle</th>
                <th class="py-3">Marque</th>
                <th class="py-3">Prix</th>
                <th class="py-3">Action</th>
            </tr>
            @foreach ($produits as $produit)
                <tr>
                    <td class="py-3">{{ $produit->libelle }}</td>
                    <td class="py-3">{{ $produit->marque }}</td>
                    <td class="py-3">{{ $produit->prix }}</td>
                    <td class=" px-0 d-flex justify-content-center align-items-center">
                        <a class=" m nav-link btn btn-info text-white me-2"
                            href="/produits/{{ $produit->id }}">Détails</a>
                        
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    @endsection
</body>


</html>