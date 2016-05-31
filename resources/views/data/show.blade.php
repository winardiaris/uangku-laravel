@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah</div>
                <div class="panel-body">
                  <table class="table table-condensed">
                    <tr>
                      <th>Tanggal</th>
                      <td>{{ $data->date }}</td>
                    </tr>
                    <tr>
                      <th>Tipe Keuangan</th>
                      <td>{{ $data->type }}</td>
                    </tr>
                    <tr>
                      <th>Jumlah</th>
                      <td>{{ $data->value }}</td>
                    </tr>
                    <tr>
                      <th>Tanggal input</th>
                      <td>{{ $data->created_at->format('M d, Y') }}</td>
                    </tr>
                  </table>
                </div>
                <div class="panel-footer"><a href="{{ route('data.index') }}" class="btn btn-xs btn-default">Kembali</a></div>
            </div>
        </div>
    </div>
</div>







@endsection
