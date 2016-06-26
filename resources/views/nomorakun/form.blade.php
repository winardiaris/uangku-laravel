<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('nomor_akun', 'Nomor akun:', ['class' => 'control-label']) !!}
      {!! Form::text('nomor_akun',null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('sub', 'Sub Dari:', ['class' => 'control-label']) !!}
    {!! Form::select('sub',$data_nomor_akun, null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('nama_akun', 'Nama akun:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_akun', null, ['class' => 'form-control']) !!}
  </div>
</div>

@section('js')
<script>
$('select#sub option').each(function(){
  v=$(this).val();
  t=$(this).text();
  
  $(this).html("<b>"+v+"</b> - <span>"+t+"</span>") ;
  
  leng = v.length;
  if(leng==2){
    $(this).prepend("&nbsp;&nbsp;");
  }
  if(leng==4){
    $(this).prepend("&nbsp;&nbsp;&nbsp;&nbsp;");
  }
  if(leng==6){
    $(this).prepend("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
  }
});
</script>
@endsection
