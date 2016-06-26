@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">
                  <div class="col-lg-12">
                  @include('program.search',['url'=>'program','link'=>'program'])
                  </div>
                  <div class="col-lg-12">
                  <div class="table-responsive">
                  <table class='table table-striped  table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th width="30px">ID</th>
                        <th width="200px">Program</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas )
                      <tr>
                        <td class="nomor_akun">{{$datas->id}}</td>
                        <td>{{$datas->program}}</td>
                        <td align="right">
                          {!! Form::model($data, ['route' => ['program.destroy', $datas], 'method'=>'delete', 'class' => 'delete'])!!}
                            <a href="{{ route('program.edit', $datas->nomor_akun) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
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

$('td.nomor_akun').each(function(){
  leng = $(this).text().length;
  if(leng<=2){
    a = $(this).text();
    $(this).html("<b>"+a+"</b>");
  }

  if(leng==2){
    $(this).prepend("&nbsp;&nbsp;&nbsp;");
  }
  if(leng==4){
    $(this).prepend("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
  }
  if(leng==6){
    $(this).prepend("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
  }

});

</script>
@endsection
