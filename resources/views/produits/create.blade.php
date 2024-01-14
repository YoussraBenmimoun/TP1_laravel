@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Produit | créer</title>
</head>

<body>
    @section('content')
        <form action="{{ route('produits.store') }}" method="post" class="w-50 p-5 mx-auto bg-dark text-light mt-5 mb-5"
            style="border-radius: 20px" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="libelle" class="form-label">Libelle :</label>
                <input type="text" class="form-control" name="libelle" placeholder="Libelle">
                @error('libelle')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="marque" class="form-label">Marque :</label>
                <input type="text" class="form-control" name="marque" placeholder="Marque">
                @error('marque')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="libelle" class="form-label">Prix :</label>
                <input type="text" class="form-control" name="prix" placeholder="Prix">
                @error('prix')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="libelle" class="form-label">Stock :</label>
                <input type="number" class="form-control" name="stock" placeholder="Stock">
                @error('stock')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="libelle" class="form-label">Image :</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center"><button type="submit" class="btn btn-success">Créer</button></div>
        </form>
    @endsection
</body>

</html>