@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$jsontahun = <?php echo json_encode($data); ?>
</script>
@endsection
