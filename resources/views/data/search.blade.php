{{-- //CATATAN search all --}}
{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="s" placeholder="cari...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}

{{-- //CATATAN search tanggal dari ke --}}
{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="custom-search-form">
    <div class="form-group">
      <label>Dari:</label>
      <input type="date" class="form-control" name="dari" placeholder="dari">
    </div>
    <div class="form-group">
      <label>Ke:</label>
      <input type="date" class="form-control" name="ke" placeholder="dari">
    </div>
    <button class="btn btn-default-sm" type="submit">
        <i class="fa fa-search"></i>
    </button>
</div>
{!! Form::close() !!}

{{-- //CATATAN search tahun --}}
{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<label>Tahun:</label>
<div class="input-group custom-search-form">
  <select class="form-control" name="tahun" id="tahun">
  </select>
  <span class="input-group-btn">
    <button class="btn btn-default-sm" type="submit">
      <i class="fa fa-search"></i>
    </button>
  </span>
</div>
{!! Form::close() !!}
