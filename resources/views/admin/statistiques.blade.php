@extends('layouts.app3')
@section('title')
    info agence
@endsection

@section('content')
 <div id="content" >
    <div class="news">




<div class="container">
    <h2 style="text-align: center;">Nombre de locations par Mois</h2>
    <div class="panel panel-primary">
      <div class="panel-heading"></div>
      <div class="panel-body">
          <div id="line-chart"></div>
      </div>
    </div>
  </div><div class="container">
  <h2 style="text-align: center;">Chiffre d'affaire</h2>
  <div class="panel panel-primary">
    <div class="panel-heading"></div>
    <div class="panel-body">
        <div id="line-chart-CA"></div>
    </div>
  </div>
</div>
  </div>
  </div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  $(function(){
    
        Highcharts.chart('line-chart', {

title: {
    text: 'Agences'
},

yAxis: {
    title: {
        text: 'Nombre de locations'
    }
},

xAxis: {
categories: <?= $terms ?>
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

series: <?= $data ?>,

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
Highcharts.chart('line-chart-CA', {

title: {
    text: 'Agences'
},

yAxis: {
    title: {
        text: 'Chiffre d\' affaire en DH'
    }
},

xAxis: {
categories: <?= $termsCA ?>
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

series: <?= $dataCA ?>,

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
  });
</script>

          
@endsection