@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Pengguna</div>
                <div class="panel-body">
                  <table class="table table-condensed">
                    <tr>
                      <th>Nama</th>
                      <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ Auth::user()->email }}</td>
                    </tr>

                  </table>
                </div>
                <div class="panel-footer"><a href="{{ url('user/setting') }}" class="btn btn-xs btn-default">Ubah</a></div>
            </div>
        </div>
    </div>
</div>



@endsection
