@extends('kerangka.master')
@section('title', 'Edit Produk')
@section('content')
      <div class="container mt-5">
          <form action="{{ route('products.update', $product->id ) }}" class="mb-4" method="POST">
              @method('PUT')
              @csrf
                <h1 class="text-center-mb-4">Buat Produk</h1>
                <div class="form-group">
                  <label for="product_name">Nama Produk</label>
                  <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') ?? $product->product_name }}">
                </div>
                <div class="form-group">
                  <label for="category_id">Kategori Produk</label>
                  <select class="custom-select" name="category_id" id="category_id">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ (old('category_id') ?? $product->category->name) == $category->name ? 'selected' : ''}}>{{ $category->name }}</option>                          
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Harga</label>
                  <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $product->price }}">
                </div>
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') ?? $product->stock }}">
                </div>
                <button type="submit" class="btn btn-primary">
                  Simpan
                </button>
          </form>
      </div>
    
@endsection
