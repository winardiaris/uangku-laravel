<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('tipe', 'Jenis Keuangan:', ['class' => 'control-label']) !!}
      {!! Form::select('tipe', ['masuk' => 'Pemasukan', 'keluar' => 'Pengeluaran'],null, ['class'=>'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('nomor_akun_id', 'Nomor Akun:', ['class' => 'control-label']) !!}
    {!! Form::select('nomor_akun_id',$data_nomor_akun, null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('tanggal', 'Tanggal:', ['class' => 'control-label']) !!}
      {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('sumber_dana_id', 'Sumber Dana:', ['class' => 'control-label']) !!}
    {!! Form::select('sumber_dana_id',$data_sumber_dana, null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-12">
  <div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:', ['class' => 'control-label']) !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('bukti', 'No Bukti:', ['class' => 'control-label']) !!}
    {!! Form::text('bukti', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('bukti_gbr', 'Photo Bukti:', ['class' => 'control-label']) !!}
    {!! Form::file('bukti_gbr', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-12"></div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('orang', 'Diterima dari:', ['class' => 'control-label']) !!}
    {!! Form::text('orang', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('program_id', 'Untuk Program:', ['class' => 'control-label']) !!}
    {!! Form::select('program_id',$data_program, null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-12">
  <div class="form-group">
      {!! Form::label('keterangan', 'Keterangan:', ['class' => 'control-label']) !!}
      {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
  </div>
</div>
@section('js')
<script>
$('select#nomor_akun_id option').each(function(){
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

$('#tipe').change(function(){
  if($(this).val()=="masuk"){
    $('label[for=orang]').text('Diterima dari: ');
  }else{
    $('label[for=orang]').text('Diberikan kepada: ');
  }
});
</script>
@endsection
