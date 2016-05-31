<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('type', 'Jenis Keuangan:', ['class' => 'control-label']) !!}
      {!! Form::select('type', ['in' => 'Pemasukan', 'out' => 'Pengeluaran'],null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('date', 'Tanggal:', ['class' => 'control-label']) !!}
      {!! Form::date('date', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-12">
  <div class="form-group">
    {!! Form::label('value', 'Jumlah:', ['class' => 'control-label']) !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('token', 'No Bukti:', ['class' => 'control-label']) !!}
    {!! Form::text('token', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('token_img', 'Photo Bukti:', ['class' => 'control-label']) !!}
    {!! Form::file('token_img', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="col-lg-12">
  <div class="form-group">
      {!! Form::label('desc', 'Keterangan:', ['class' => 'control-label']) !!}
      {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
  </div>
</div>
