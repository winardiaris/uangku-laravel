@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">
                  <div class="col-lg-12">
                  @include('data.search',['url'=>'data','link'=>'data'])
                  </div>
                  <div class="col-lg-12">
                  <div class="table-responsive">
                  <table class='table table-striped table-bordered table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th width="100px">Tanggal</th>
                        <th width="100px">Akun</th>
                        <th>Keterangan</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas )
                      <tr>
                        <td><a href="{{ route('data.show', $datas) }}">{{$datas->tanggal}}</a></td>
                        <td>{{$datas->nomor_akun_id}}</td>
                        <td>{{$datas->keterangan}}</td>
                        <td>
                         @if($datas->tipe == 'masuk')
                          {{$datas->jumlah}} 
                         @else
                          0
                         @endif
                         </td>
                        <td>
                         @if($datas->tipe == "keluar")
                          {{$datas->jumlah}}
                         @else
                          0 
                         @endif
                         </td>
                        <td>
                          {!! Form::model($data, ['route' => ['data.destroy', $datas], 'method'=>'delete', 'class' => 'delete'])!!}
                            <a href="{{ route('data.edit', $datas) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                  </div>
                  {{-- //SELESAI saldo berdasarkan search--}}
                 <div class="text-right">Saldo: <b><span class="rp" style="margin-left:30px"> 
                   @if (Request::route()->getName() == 'data.index')
                      {{$data->where('tipe','masuk')->sum('jumlah')-$data->where('tipe','keluar')->sum('jumlah')}}
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
@section('js')
<script>
$(".delete").on("submit", function(){
          return confirm("Do you want to delete this item?");
              
  });
</script>
@endsection
