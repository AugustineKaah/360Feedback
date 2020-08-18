@extends('layouts.app')

<script src="{{ asset('js/chart.min.js') }}" ></script>
<script src="{{ asset('js/utils.js') }}" ></script>
@section('header')
  Administration  
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
          <h3>{{$user_count}}</h3>
    
            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
          <h3>{{$feedback_count}}<sup style="font-size: 20px"></sup></h3>
    
            <p>Feedback Requests</p>
          </div>
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>
          <a href="/admin_report/view/feedback_requests" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3>{{$completed_count}}</h3>
    
            <p>Completed Feedbacks</p>
          </div>
          <div class="icon">
            <i class="fa fa-comment"></i>
          </div>
          <a href="/admin_report/view/completed_feedbacks" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
          <h3>{{$average_rating}}</h3>
    
            <p>Average Rating For All Feedbacks</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header bg-maroon">
                <span class="chart-title">Overall Feedback Completeion Rate</span>
  
               
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="donought" ></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  
  
          </div>

    


        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="bg-light-blue card-header">
                <span class="chart-title">Average Rating per Core Value</span>
  
               
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="line" ></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  
        </div>
          </div>
<br>
          <div class="row">
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="card card-info">
                  <div class="card-header bg-blue">
                    <span class="chart-title">Feedback Completion by Departments</span>
      
                   
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="bar" ></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
      
            </div>
          </div>
    </div>

  
    <script>
        var departments = JSON.parse('<?php echo json_encode($departments) ?>');
       
    var donutChartCanvas = $('#donought').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Pending', 
            'Completed', 
        ],
        datasets: [
          {
            data: [
                {{$completed_count}},
                {{$pending_count}}
            ],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions      
      })
  

      new Chart(document.getElementById("line"),
      {
          "type":"line",
          "data":{
              "labels":[
                  "Professional","Ethics","Efficiency","Responsive"
                  ],
                "datasets":
                [{
                    "label":"Assessment Rating",
                    "data":[
                        {{$average_professional}},
                        {{$average_ethics}},
                        {{$average_efficiency}},
                        {{$average_responsive}}
                    ],
                    "fill":false,
                    "borderColor":"rgb(75, 192, 192)",
                    "lineTension":0.1}]},
                    "options":{

                    }
        }
        );


//stacked bar
var stackedBarChartCanvas = $('#bar').get(0).getContext('2d')
      var stackedBarChartData = {
          labels  : 
          [
           
          ],
        datasets: [
          {
            label               : 'Completed',
            backgroundColor     : '#00a65a',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : []
          },
          {
            label               : 'Pending',
            backgroundColor     : '#f56954',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : []
          },
        ]
      }
      //append department names  fo the labels array
      departments.forEach(element => {
             stackedBarChartData.labels.push(element.department);
            // stackedBarChartData.datasets[0].data.push(5)
             /*var completed = JSON.parse(`<?php 
            
             $completed =  $feedbacks->filter(function ($results) {
            return $results->status == 'Completed';
                });
              echo json_encode($completed) ?>`);
             stackedBarChartData.datasets[0].data.push(completed)*/
        })

        var stackedBarChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

       
        
  
    
      
    </script>


    <?php 
    
    foreach($departments as $department){
   
    $dep = $department->department;
 
    
        $completed =  $feedbacks->filter(function ($results) use($dep ) {
            return $results->department_id == $dep && $results->status == 'Completed';
        });
        $pending =  $feedbacks->filter(function ($results) use($dep ) {
            return $results->department_id == $dep && $results->status == 'Pending';
        });
       echo ('
       <script> 
        stackedBarChartData.datasets[0].data.push('.count($completed).');
        stackedBarChartData.datasets[1].data.push('.count($pending).');
        var stackedBarChart = new Chart(stackedBarChartCanvas, {
          type: "bar", 
          data: stackedBarChartData,
          options: stackedBarChartOptions
        })
        
        </script>');
    }
    ?>

@endsection
