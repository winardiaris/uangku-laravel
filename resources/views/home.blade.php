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
                    <hr>
                    <i>Banyak data: <span id="banyak"></span></i>
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
var ins=[];
var outs=[];
for(i=0;i<json.length;i++){
  labels.push(json[i].date);
  if(json[i].type=='in'){
   ins.push(json[i].date) ;
  }else{
    outs.push(json[i].date) ;
  }
}

var labelChart = jQuery.unique(labels);
for(j=0;j<json.length;j++){

  var adains = jQuery.inArray(json[j].date,outs);
  var adaouts = jQuery.inArray(json[j].date,ins);

  /* console.log(json[j].date+":"+adains+":"+adaouts); */
  if(adains>=0 && adaouts>=0){
    if(json[j].type=='in'){
      dataPemasukan.push(json[j].value);
    }else{
      dataPengeluaran.push(json[j].value);
    }
  }
  else if(adains>=0 && adaouts<0){
      dataPemasukan.push(0);
      dataPengeluaran.push(json[j].value);
  }
  else if(adains<0 && adaouts>=0){
      dataPemasukan.push(json[j].value);
      dataPengeluaran.push(0);
  }
}
/* console.log('in: '+ dataPemasukan); */
/* console.log('out: '+ dataPengeluaran); */
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
var myLineChart = Chart.Line(ctx,config);

$('#banyak').text(json.length);
</script>
@endsection
