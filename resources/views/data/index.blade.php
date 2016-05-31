@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>
                <div class="panel-body">
                  <table class='table table-striped table-bordered table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Tipe</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $data )
                      <tr>
                        <td><a href="{{ route('data.show', $data) }}">{{$data->date}}</a></td>
                        <td>{{$data->value}}</td>
                        <td>{{$data->desc}}</td>
                        <td>{{$data->type}}</td>
                        <td>
                          {!! Form::model($data, ['route' => ['data.destroy', $data], 'method'=>'delete', 'class' => 'form-inline'])!!}
                          <a href="{{ route('data.edit', $data) }}" class="btn btn-xs btn-primary">Ubah</a>
                          {!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </ul>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
