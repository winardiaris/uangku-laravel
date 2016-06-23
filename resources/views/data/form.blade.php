<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('tipe', 'Jenis Keuangan:', ['class' => 'control-label']) !!}
      {!! Form::select('tipe', ['masuk' => 'Pemasukan', 'keluar' => 'Pengeluaran'],null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
      {!! Form::label('tanggal', 'Tanggal:', ['class' => 'control-label']) !!}
      {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
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
<div class="col-lg-12">
  <div class="form-group">
      {!! Form::label('keterangan', 'Keterangan:', ['class' => 'control-label']) !!}
      {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
  </div>
</div>
