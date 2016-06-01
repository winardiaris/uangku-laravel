@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">

                  @include('data.search',['url'=>'data','link'=>'data'])
                  <table class='table table-striped table-bordered table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th width="100px">Tanggal</th>
                        <th width="50px">Tipe</th>
                        <th width="100px">No Bukti</th>
                        <th width="150px">Jumlah</th>
                        <th>Keterangan</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas )
                      <tr>
                        <td><a href="{{ route('data.show', $datas) }}">{{$datas->date}}</a></td>
                        <td>{{$datas->type}}</td>
                        <td>{{$datas->token}}</td>
                        <td align="right"class="rp">{{$datas->value}}</td>
                        <td>{{$datas->desc}}</td>
                        <td>
                          {!! Form::model($data, ['route' => ['data.destroy', $datas], 'method'=>'delete', 'class' => 'form-inline'])!!}
                          <a href="{{ route('data.edit', $datas) }}" class="btn btn-xs btn-primary">Ubah</a>
                          {!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    <div class="text-right"> Saldo:    <b><span id="saldoData" style="margin-left:30px;"></span></b></div>
                  <hr>
                  {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
