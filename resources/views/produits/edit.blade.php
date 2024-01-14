@extends("layouts.app")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Produit | modifier</title>
</head>
<body>
    @section('content')
    @foreach ($produits as $produit)
    @if ($produit['Id']==$id)
    <form action="{{ route('produits.update',['produit'=>$produit['Id']]) }}" method="post" class="w-50 p-5 mx-auto bg-dark text-light mt-5 " style="border-radius: 20px" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="libelle" class="form-label">Libelle :</label>
        <input type="text" class="form-control" name="libelle" value="{{ $produit['Libelle'] }}">
        @error("libelle")
            <p style="color:red">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
        <label for="marque" class="form-label">Marque :</label>
        <input type="text" class="form-control" name="marque" value="{{ $produit['Marque'] }}">
        @error("marque")
            <p style="color:red">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
        <label for="prix" class="form-label">Prix :</label>
        <input type="text" class="form-control" name="prix" value="{{ $produit['Prix'] }}">
        @error("prix")
            <p style="color:red">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
        <label for="stock" class="form-label">Stock :</label>
        <input type="number" class="form-control" name="stock" value="{{ $produit['Stock'] }}" >
        @error("stock")
            <p style="color:red">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
        <label for="image" class="form-label">Image :</label>
        <input type="file" class="form-control" name="image" value="{{ old('image') }}">
        @error("image")
            <p style="color:red">{{ $message }}</p>
        @enderror
        </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success">Modifier</button>
    </div>
    </form>
    @break
    @endif
    @endforeach
    @endsection
</body>
</html>