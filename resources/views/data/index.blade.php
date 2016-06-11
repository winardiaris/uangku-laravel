@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">
                  <div class="table-responsive">>
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
                        <td align="center">
                            @if($datas->type == 'in')
                                <i class="fa fa-plus-circle text-success"></i>
                            @else
                                <i class="fa fa-minus-circle text-danger"></i>
                            @endif
                        </td>
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
                  </div>
                  {{-- //SELESAI saldo berdasarkan search--}}
                 <div class="text-right">Saldo: <b><span class="rp" style="margin-left:30px"> 
                   @if (Request::route()->getName() == 'data.index')
                      {{$data->where('type','in')->sum('value')-$data->where('type','out')->sum('value')}}
                   @endif
                </span></b></div>
    
                  <hr>
                  {{-- //SELESAI Pagination --}}
                  {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
