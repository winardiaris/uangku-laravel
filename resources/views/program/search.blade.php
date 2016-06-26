{{-- //CATATAN search all --}}
{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="col-lg-12 col-md-12">
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="s" placeholder="cari...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}

<a class="btn btn-default" href="{{route('program.create')}}"><i class="fa fa-plus"></i> Tambah Program</a>
</div>

