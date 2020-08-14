@extends('kerangka.master')
@section('title', 'Create Category')
@section('nav-category', 'active')
@section('content')

<div class="container mt-5">
    <form action="{{ route('categories.store') }}" class="mb-4" method="POST">
        @csrf
        <h1 class="text-center">Buat Category Produk</h1>
        <div class="form-group">
            <label for="name">Nama Category</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
            @error('name')
                <div class="text-center">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
