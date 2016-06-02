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
                      <th >Tanggal</th>
                      <td>{{ $data->date }}</td>
                    </tr>
                    <tr>
                      <th>Tipe Keuangan</th>
                      <td>{{ $data->type }}</td>
                    </tr>
                    <tr>
                      <th>Jumlah</th>
                      <td><span class="rp">Rp. {{ $data->value }}</span></td>
                    </tr>
                    <tr>
                      <th>No Bukti</th>
                      <td>{{ $data->token }}</td>
                    </tr>
                    <tr>
                      <th>Bukti Gambar</th>
                      <td>
                      @if ($data->token_image)

                          <a href="#" data-toggle="modal" data-target="#myModal">Lihat</a>
                          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bukti Gambar</h4>
      </div>
      <div class="modal-body">
        <a href="{{ asset('img/') }}/{{ $data->token_image }}">unduh</a>
        <img class="img-responsive" src="{{ asset('img/') }}/{{ $data->token_image }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
                      @else
                           <i>Tidak ada gambar bukti</i>
                      @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Keterangan</th>
                      <td>{{ $data->desc }}</td>
                    </tr>
                    <tr>
                      <th>Tanggal input</th>
                      <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    <tr>
                      <th>Tanggal ubah</th>
                      <td>{{ $data->updated_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                  </table>
                </div>
                <div class="panel-footer">
                  <a href="{{ route('data.index') }}" class="btn btn-xs btn-default">Kembali</a>
                  <a href="{{ route('data.edit', $data) }}" class="btn btn-xs btn-primary">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
