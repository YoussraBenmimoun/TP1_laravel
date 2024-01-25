<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/produits">Index</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('produits.create')}}">Créer un produit</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
      <main class="container mt-4">

        @if (session('success'))
          <div class="alert alert-success text-center">
              {{ session('success') }}
          </div>
        @endif

        @yield('content')
      </main>
      <footer class="bg-dark text-center text-light p-3  mt-auto">
        &copy; 2024
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cB6oCtTF/rzWTzi3c+1S6I3bEG5pO9LHRu4Qy1MVz1TkOLICwS/JDEH2hOIdTQN" crossorigin="anonymous"></script>
</body>
</html>