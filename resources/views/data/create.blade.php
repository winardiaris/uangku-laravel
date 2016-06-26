@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Transaksi Keuangan</div>
                <div class="panel-body">
                  {!! Form::open([ 'route' => 'data.store','files'=>true]) !!}

                  @include('data.form')
                  <div class="col-lg-12">

                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
