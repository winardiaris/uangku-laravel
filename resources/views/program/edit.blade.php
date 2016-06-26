@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                  {!! Form::model($data, ['route' => ['program.update', $data], 'method'=>'PUT','files'=>true])!!}

                  @include('program.form')
                  <div class="col-lg-12">
                    {!! Form::submit('Perbaharui', ['class' => 'btn btn-primary']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
