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
                      @foreach(App\Data::all() as $data )
                      <tr>
                        <td>{{$data->date}}</td>
                        <td>{{$data->value}}</td>
                        <td>{{$data->desc}}</td>
                        <td>{{$data->type}}</td>
                        <td><a href="/data/edit/{{$data->id}}" class="btn btn-primary"> Ubah<a/>
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
