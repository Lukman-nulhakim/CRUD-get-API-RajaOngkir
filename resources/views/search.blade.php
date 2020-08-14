@extends('kerangka.master')

@section('content')

    <div class="container">
        <h1>Tempat Liburan</h1>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tempat</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Jumlah Pengunjung</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($attractions as $tampil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tampil->tempat }}</td>
                        <td>{{ $tampil->provinsi }}</td>
                        <td>{{ $tampil->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
@endsection