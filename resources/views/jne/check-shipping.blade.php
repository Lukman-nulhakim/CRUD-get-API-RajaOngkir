@extends('admin-template')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $judul }}</h1>
                    <div class="card m-2">
                    <div class="card-body">
                        <form action="{{ action('PageController@processShipping') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="origin">Kota Pengirim</label>
                                <select name="origin" id="origin" class="form-control">
                                    <option selected="selected" value="">Pilih Kota</option>
                                    @foreach ($city as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="destination">Kota Penerima</label>
                                <select name="destination" id="destination" class="form-control">
                                    <option selected="selected" value="">Kota Tujuan</option>
                                    @foreach ($city as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat</label>
                                <input type="text" name="weight" class="form-control" placeholder="Berat Barang">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection