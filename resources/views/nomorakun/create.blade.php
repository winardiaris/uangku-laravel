@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah</div>
                <div class="panel-body">
                  {!! Form::open([ 'route' => 'nomorakun.store','files'=>true]) !!}

                  @include('nomorakun.form')
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
