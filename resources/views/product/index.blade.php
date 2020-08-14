@extends('kerangka.master')
@section('title', 'Halaman Produk')
@section('nav-produk-lihat', 'active')
@section('content')
<div class="container mt-5">
  <h1>Product List</h1>
  <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>

  @if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
  @endif

  <table class="table">
      <thead>
          <tr>
              <th>#</th>
              <th>Kategory</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stock</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <tr>
            @forelse ($product as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->stock }}</td>
                <td>
                    <a href="{{ route('products.edit', $item->id ) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <td colspan="4" align="center">Data Kosong</td>
            @endforelse
        </tr>
      </tbody>
  </table>
</div>  
@endsection
      
      


   