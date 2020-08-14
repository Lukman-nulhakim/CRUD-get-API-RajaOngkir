@extends('admin-template')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li><a href="{{ url('page/checkshipping') }}" class="btn btn-info">Kembali ke halaman check shipping</a></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $judul }}</h1>
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="box-header">
                                <h3 class="box-title">Dari : {{ $origin }}</h3>
                                <h3 class="box-title">Ke : {{ $destination }}</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-srtiped">
                                    <thead>
                                        <tr>
                                            <th>Nama Layanan</th>
                                            <th>Tarif</th>
                                            <th>Estimasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($array_result["rajaongkir"]["results"][0]["costs"]); $i++)
                                            <tr>
                                                <td>{{ $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] }}</td>
                                                <td>{{ $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] }}</td>
                                                <td>{{ $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] }}</td>
                                            </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection