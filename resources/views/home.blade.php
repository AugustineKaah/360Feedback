@extends('layouts.app')
<script src="{{ asset('js/chart.min.js') }}" ></script>
<script src="{{ asset('js/utils.js') }}" ></script>
@section('header')
  Dashboard  
@endsection
@section('content')

<style>
.chart-header{
    padding: 4px 8px 4px 8px;

}
.chart-title{
    font-size: 16px;
    font-weight: bold;
}
.float-right{
    float: right;
}
</style>

<div class="">
    
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-olive"><i class="fa fa-envelope"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Requests Sent</span>
                  <span class="info-box-number">
                    {{$requests_sent}}
                    <small></small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-blue "><i class="fa fa-comments"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Feedbacks Received</span>
                <span class="info-box-number">{{$feedbacks_received}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-maroon "><i class="fa fa-sticky-note"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Awaiting Feedbacks</span>
              <span class="info-box-number">{{$awaiting_feedbacks}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-purple "><i class="fa fa-envelope-open"></i></span>
    
        <div class="info-box-content">
          <span class="info-box-text">Requests Received</span>
          <span class="info-box-number">{{$requests_received}}
        <!-- /.info-box-content -->
      </div>
    </div>
          </div>
        </div>
 <br><br>
          
        <div class="container-fluid">
          <div class="row">
 
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-info">
                <div class="chart-header bg-light-blue">
                  <span class="chart-title">Competency Rating by Category</span>
    
                 
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="radar" style="min-height: 400px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
    
    
            </div>
            <!-- /.col (RIGHT) -->
    
            <div class="col-md-6">
                <div class="card-card-info">
                    <div class="chart-header bg-gray">
                        <span class="chart-title">Rating per Core Value</span>
              
                    </div>
                    <div class="card-body">
              <div class="progress-group">
                Professional
              <span class="float-right"><b>{{$average_professional}}</b> / 5</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: {{($average_professional/5)*100}}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
    
              <div class="progress-group">
                Ethics
                <span class="float-right"><b>{{$average_ethics}}</b> / 5</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-maroon" style="width: {{($average_ethics/5)*100}}%"></div>
                </div>
              </div>
    
              <!-- /.progress-group -->
              <div class="progress-group">
                  Efficiency
                
                <span class="float-right"><b>{{$average_efficiency}}</b> / 5</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-aqua" style="width: {{($average_efficiency/5)*100}}%"></div>
                </div>
              </div>
    
              <!-- /.progress-group -->
              <div class="progress-group">
                Responsive
                <span class="float-right"><b>{{$average_responsive}}</b> / 5</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-lime" style="width: {{($average_responsive/5)*100}}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
                </div>
            
            </div>

            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                  <div class="chart-header bg-light-blue">
                    <span class="chart-title">Competency Rating by Category</span>
      
                   
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="lineChart" ></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
      
      
              </div>


          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    

    

	<script>
	

		var color = Chart.helpers.color;
		var config = {
			type: 'radar',
			data: {
				labels: ['Professional', 'Ethics', 'Efficiency', 'Responsive'],
				datasets: [{
					label: 'Top-Down',
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [
						{{$average_professional_top}},
						{{$average_ethics_top}},
						{{$average_efficiency_top}},
						{{$average_responsive_top}}
					]
				}, {
					label: 'Peer',
					backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
					borderColor: window.chartColors.blue,
					pointBackgroundColor: window.chartColors.blue,
					data: [
						{{$average_professional_peer}},
						{{$average_ethics_peer}},
						{{$average_efficiency_peer}},
						{{$average_responsive_peer}}
					]
                },
                {
					label: 'Bottom-Up',
					backgroundColor: color(window.chartColors.orange).alpha(0.2).rgbString(),
					borderColor: window.chartColors.orange,
					pointBackgroundColor: window.chartColors.orange,
					data: [
						{{$average_professional_bottom}},
						{{$average_ethics_bottom}},
						{{$average_efficiency_bottom}},
						{{$average_responsive_bottom}}
					]
                },
                {
					label: 'Self',
					backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
					borderColor: window.chartColors.green,
					pointBackgroundColor: window.chartColors.green,
					data: [
						{{$average_professional_self}},
						{{$average_ethics_self}},
						{{$average_efficiency_self}},
						{{$average_responsive_self}}
					]
				}]
			},
			options: {
				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: ''
				},
				scale: {
					ticks: {
						beginAtZero: true
					}
				}
			}
		};

		window.onload = function() {
			window.myRadar = new Chart(document.getElementById('radar'), config);
		};

	
	</script>
    
      <script>
         
        $(function () {
         /*
          var areaChartCanvas =''
      
          var areaChartData = {
            labels  : ['Professional', 'Ethics', 'Efficient', 'Responsive'],
            datasets: [
              {
                label               : 'Digital Goods',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [4.5, 2.67, 3.9, 3.5, ]
              },
              {
                label               : 'Electronics',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [3.4, 4.1, 4.7, 2.9, ]
              },
            ]
          }
      
          var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                gridLines : {
                  display : false,
                }
              }],
              yAxes: [{
                gridLines : {
                  display : false,
                }
              }]
            }
          }
      
          // This will get the first returned node in the jQuery collection.
          var areaChart       = new Chart(areaChartCanvas, { 
            type: 'line',
            data: areaChartData, 
            options: areaChartOptions
          })
      */
          //-------------
          //- LINE CHART -
          //--------------
          var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
          var lineChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
              display: true
            },
            scales: {
              xAxes: [{
                gridLines : {
                  display : false,
                }
              }],
              yAxes: [{
                gridLines : {
                  display : false,
                }
              }]
            }
          }
          var lineChartData = {
            labels  : ['Professional', 'Ethics', 'Efficient', 'Responsive'],
            datasets: [
              {
                label               : 'Top-Down',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [
                    {{$average_professional_top}},
						{{$average_ethics_top}},
						{{$average_efficiency_top}},
						{{$average_responsive_top}}
                 ]
              },
              {
                label               : 'Peer',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [
                    {{$average_professional_peer}},
						{{$average_ethics_peer}},
						{{$average_efficiency_peer}},
						{{$average_responsive_peer}}
                ]
              },
              {
                label               : 'Bottom-Up',
                backgroundColor     :  window.chartColors.red,
                borderColor         :  window.chartColors.red,
                pointRadius         : false,
                pointColor          :  window.chartColors.red,
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [
                    {{$average_professional_bottom}},
						{{$average_ethics_bottom}},
						{{$average_efficiency_bottom}},
						{{$average_responsive_bottom}}
                 ]
              },
              {
                label               : 'Self',
                backgroundColor     : window.chartColors.green,
                borderColor         : window.chartColors.green,
                pointRadius         : false,
                pointColor          : window.chartColors.green,
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [
                    {{$average_professional_self}},
						{{$average_ethics_self}},
						{{$average_efficiency_self}},
                        {{$average_responsive_self}}
                     ]
              },
            ]
          }
          lineChartData.datasets[0].fill = false;
          lineChartData.datasets[1].fill = false;
          lineChartOptions.datasetFill = false
      
          var lineChart = new Chart(lineChartCanvas, { 
            type: 'line',
            data: lineChartData, 
            options: lineChartOptions
          })
      
        })
      </script>


    </div>
</div>
@endsection
