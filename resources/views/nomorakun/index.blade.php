@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">
                  <div class="col-lg-12">
                  @include('nomorakun.search',['url'=>'data','link'=>'data'])
                  </div>
                  <div class="col-lg-12">
                  <div class="table-responsive">
                  <table class='table table-striped  table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th width="10px">ID</th>
                        <th width="200px">Sumber Dana</th>
                        <th width="100px">Telepon</th>
                        <th width="">Alamat</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas )
                      <tr>
                        <td><a href="{{ route('nomorakun.show', $datas) }}">{{$datas->id}}</a></td>
                        <td>{{$datas->nama_sumber_dana}}</td>
                        <td>{{$datas->telepon}}</td>
                        <td>{{$datas->alamat}}</td>
                        <td>
                          {!! Form::model($data, ['route' => ['nomorakun.destroy', $datas], 'method'=>'delete', 'class' => 'delete'])!!}
                            <a href="{{ route('nomorakun.edit', $datas) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
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
