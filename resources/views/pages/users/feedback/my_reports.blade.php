@extends('layouts.app')
<script src="{{ asset('js/chart.min.js') }}" ></script>
<script src="{{ asset('js/utils.js') }}" ></script>
@section('header')
  Assessment Report
@endsection
@section('content')

    <div class="col">
        <div class="card">
            <div class="card-header bg-purple">
               <b> Professional</b>
            </div>
            <div class="card-body ">
                <table class="table">
                    <tr style="font-weight:bold">
                        <td>#</td>
                        <td>Competency</td>
                        <td>Actions</td>
                        <td>Avg. Score</td>
                    <td rowspan="{{count($professional_results)+1}}" style="width:500px; vertical-align:bottom">
                        <div style="width:500px">
                            <canvas id="professional"></canvas>
                        </div>
                    
                        <script type="text/javascript">
                         
                                         
                         new Chart(document.getElementById("professional"),
                        {
                            "type":"polarArea",
                            "data":
                            {
                                "labels":[@foreach($professional_results as $key=>$selection)
                                             'P'+{{++$key}},
                                            @endforeach],
                                "datasets":[
                                    {"label":"Rating",
                                    "data":[
                                        @foreach($professional_results as $key=>$selection)
                                        {{$selection->average}},
                                            @endforeach
                                    ],
                                    "backgroundColor":["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)"
                                ]}
                            ]}
                        });                     
                        </script>   
                        </td>
                    </tr>
                
                        @foreach ($professional_results as $key=> $selection)
                        <tr>
                            <td><b>P{{++$key}}</b></td>
                            <td>{{$selection->competency}}</td>
                            <td>{{$selection->description}}</td>
                            <td>{{number_format((float)$selection->average, 1, '.', '')}}                 
                                
                           </td>
                        </tr>
                @endforeach
                   
                </table>
            </div>
        </div>
<br><br>

        <div class="card">
            <div class="card-header bg-green">
               <b> Ethics</b>
            </div>
            <div class="card-body ">
                <table class="table">
                    <tr style="font-weight:bold">
                        
                        <td>#</td>
                        <td>Competency</td>
                        <td>Actions</td>
                        <td>Avg. Score</td>
                        
                    <td rowspan="{{count($ethics_results)+1}}" style="width:500px; vertical-align:bottom">
                        <div style="width:500px">
                            <canvas id="ethics" ></canvas>
                        </div>
                    
                        <script type="text/javascript">
                            new Chart(document.getElementById("ethics"),
                             {
                                "type":"bar",
                                "data":{
                                    "labels":[
                                            @foreach($ethics_results as $key=>$selection)
                                             'EF'+{{++$key}},
                                            @endforeach
                                    ],
                            "datasets":[{
                                "label":"Rating",
                                "data":[
                                    @foreach($ethics_results as $key=>$selection)
                                             {{$selection->average}},
                                            @endforeach
                                ],
                            
                                "fill":false,
                                    "backgroundColor":[
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(153, 102, 255, 0.2)","rgba(255, 205, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)",
                                    "rgba(201, 203, 207, 0.2)"],
                                    "borderColor":["rgb(255, 99, 132)","rgb(153, 102, 255)",
                                    "rgb(255, 205, 86)","rgb(75, 192, 192)",
                                    "rgb(54, 162, 235)",
                                    "rgb(201, 203, 207)"],"borderWidth":1}]},
                                "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
                            });
                             
                                                    
                        </script>   
                        </td>
                    </tr>
                
                        @foreach ($ethics_results as $key=> $selection)
                        <tr>
                            <td><b>ET{{++$key}}</b></td>
                            <td>{{$selection->competency}}</td>
                            <td>{{$selection->description}}</td>
                            <td>{{number_format((float)$selection->average, 1, '.', '')}}                 
                                
                           </td>
                        </tr>
                @endforeach
                    
                </table>
            </div>
        </div>
<br><br>

        <div class="card">
            <div class="card-header bg-blue">
                <b>Efficiency</b>
            </div>
            <div class="card-body ">
                <table class="table">
                    <tr style="font-weight:bold">
                        <td>#</td>
                        <td>Competency</td>
                        <td>Actions</td>
                        <td>Avg. Score</td>
                    <td rowspan="{{count($efficiency_results)+1}}" style="width:500px; vertical-align:bottom">
                        <div style="width:500px">
                            <canvas id="efficiency"></canvas>
                        </div>
                    
                        <script type="text/javascript">
                         
                                         
                                new Chart(document.getElementById("efficiency"),
                             {
                                "type":"pie",
                                "data":{
                                    "labels":[
                                            @foreach($efficiency_results as $key=>$selection)
                                             'EF'+{{++$key}},
                                            @endforeach
                                    ],
                            "datasets":[{
                                "label":"Rating",
                                "data":[
                                    @foreach($efficiency_results as $key=>$selection)
                                             {{$selection->average}},
                                            @endforeach
                                ],
                                "fill":false,
                                "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)"],"borderWidth":1}]},
                            "options":''});
                                                    
                        </script>   
                        </td>
                    </tr>
                
                 
                        @foreach ($efficiency_results as $key=> $selection)
                        <tr>
                            <td><b>EF{{++$key}}</b></td>
                            <td>{{$selection->competency}}</td>
                            <td>{{$selection->description}}</td>
                            <td>{{number_format((float)$selection->average, 1, '.', '')}}                 
                                
                           </td>
                        </tr>
                @endforeach
                   
                </table>
            </div>
        </div>
<br><br>

        <div class="card">
            <div class="card-header bg-teal">
              <b> Responsive</b>
            </div>
            <div class="card-body ">
                <table class="table">
                    
                        <tr style="font-weight:bold">
                            <td>#</td>
                            <td>Competency</td>
                            <td>Actions</td>
                            <td>Avg. Score</td>
                        <td rowspan="{{count($responsive_results)+1}}" style="width:400px; vertical-align:bottom">
                            <div style="width:500px">
                                <canvas id="responsive" style="width:400px"></canvas>
                            </div>
                        
                            <script type="text/javascript">
                             
                                             
                                    new Chart(document.getElementById("responsive"),
                                 {
                                    "type":"line",
                                    "data":{
                                        "labels":[
                                                @foreach($responsive_results as $key=>$selection)
                                                 'R'+{{++$key}},
                                                @endforeach
                                        ],
                                "datasets":[{
                                    "label":'Rating',
                                    "data":[
                                        @foreach($responsive_results as $key=>$selection)
                                                 {{$selection->average}},
                                                @endforeach
                                    ],
                                    
                                "fill":true,
                                "backgroundColor":"rgb(195, 205, 86)","borderWidth":5, "lineTension":0.1}]},
                            "options":''});
                                                        
                            </script>   
                            </td>
                        </tr>
                    
                @foreach ($responsive_results as $key=>$selection)
                        <tr>
                        <td><b>R{{++$key}}</b></td>
                            <td>{{$selection->competency}}</td>
                            <td>{{$selection->description}}</td>
                            <td>{{number_format((float)$selection->average, 1, '.', '')}}                 
                                
                           </td>
                        
                        </tr>
                @endforeach
                   
                </table>
            </div>
        </div>
    </div>
@endsection


