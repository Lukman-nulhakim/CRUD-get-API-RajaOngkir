<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PT ABC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item @yield('nav-produk')">
              <a class="nav-link" href="{{ route('products.create') }}">Buat Produk</a>
            </li>
            <li class="nav-item @yield('nav-produk-lihat')">
              <a class="nav-link" href="{{ route('products.index') }}">Lihat Produk</a>
            </li>
            <li class="nav-item @yield('nav-category')">
              <a class="nav-link" href="{{ route('categories.create') }}">Tambah Category</a>
            </li>
            <li class="nav-item @yield('nav-category-lihat')">
              <a class="nav-link" href="{{ route('categories.index') }}">Lihat Category</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

      @yield('content')

      <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>