@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  @include('data.search',['url'=>'home','link'=>'home'])
                  <div id="chart">
                    <canvas id="myChart" width="1100" height="600"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
var json = <?php echo json_encode($data); ?>;
var labels = [];
var dataPemasukan = [];
var dataPengeluaran = [];
for(i=0;i<json.length;i++){
  labels.push(json[i].date);
  if(json[i].type=='in'){
    dataPemasukan.push(json[i].value);
  }else{
    dataPengeluaran.push(json[i].value);
  }
}
var labelChart = jQuery.unique(labels);

var config =  {
              type:'line',
              data:{
                labels:labelChart,
                datasets:[
                  {
                    label:'Pemasukan',
                    data: dataPemasukan,
                    fill:false,
                    borderDash:[5,5],
                    borderColor:"rgba(89,68,166,255)",
                    backgroundColor:"rgba(89,68,166,255)",
                  },
                  {
                    label:'Pengeluaran',
                    data: dataPengeluaran,
                    fill:false,
                    borderDash:[5,5],
                    borderColor:"rgba(227,68,84,255)",
                    backgroundColor:"rgba(227,68,84,255)",
                  }
                ]
              },  
                options:{
                    responsive:true,
                    title:{
                      display:true,
                        text:'Data Keuangan'
                    },
                    tooltips:{
                      mode:'label'

                    }
                  }
    
              };

  var ctx = document.getElementById("myChart").getContext("2d");
  /* window.myLine = new Chart(ctx, config); */
  var myLineChart = Chart.Line(ctx,config);
//BELUM jika ada data kosong pada tanggal harusnya pada tanggal tersebut value=0                      
</script>
@endsection
