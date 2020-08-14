@extends('kerangka.master')
@section('title', 'Halaman Category')
@section('nav-category-lihat', 'active')
@section('content')
    
<div class="container mt-5">
    <h1>List Produk</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                
            @endforelse
            
        </tbody>
    </table>
</div>
    
@endsection
