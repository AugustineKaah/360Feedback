@extends('layouts.app')
@section('header')
  Competency Assignment  
@endsection
<style>
    .slidecontainer {
      width: 100%;
    }
    
    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }
    
    .slider:hover {
      opacity: 1;
    }
    
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #0f2f4a;
      cursor: pointer;
    }
    
    .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #0f2f4a;
      cursor: pointer;
    }
    </style>
    <style>
 
    
    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }
    
    #msform fieldset .form-card {
        background:transparent;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;
        position: relative
    }
    
    #msform fieldset {
        background:transparent;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }
    
    #msform fieldset:not(:first-of-type) {
        display: none
    }
    
    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }
    
    #msform input,
    #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px
    }
    
    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid green;
        outline-width: 0
    }
    
    #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }
    
    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
    }
    
    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }
    
    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }
    
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }
    
    select.list-dt:focus {
        border-bottom: 2px solid skyblue;
    }
    
    .cardd {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative;
        background-color:transparent;
    }
    
    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }
    
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }
    
    #progressbar .active {
        color: #000000
    }
    
    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative
    }
    
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023"
    }
    
    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }
    
    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d"
    }
    
    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }
    
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }
    
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }
    
    #progressbar li.active:before,
    #progressbar li.active:after {
        background:#0f2f4a;
    }
    
    
    .fit-image {
        width: 100%;
        object-fit: cover
    }
   
    
    </style>
                                    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                    
    <script type='text/javascript'>
      function reversal(val, div){
      console.log(val);
      console.log(div);
      var div_id = '#d'+div;
       $(div_id).children('.radio ').each(function () {
           var vall = $(this).attr('data-value');
           if(vall == val){
               $(this).parent().find('.radio').removeClass('selected');
   $(this).parent().children().find('.level').removeClass('highlight');
   $(this).addClass('selected');
   $(this).children().find('.level').addClass('highlight');
               
           }
   
});
   }
   $(document)
    //validate form before submit
    .on('click', 'form input[type=submit]', function(e) {
    var uncompleted = 0;
    $('input[type="hidden"]').each(function() {
            if ($.trim($(this).val()) == '') {
                uncompleted+=1
        }
    });

    if(uncompleted != 0) {
        $('#err').text('Please make sure you have made a selection for each competency')    
        $('#err').show();
      e.preventDefault();
    }
    });
    $(document).ready(function(){
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
   
    

    $(".next").click(function(){
    current_fs = $(this).parent();

   


    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });
    
  
    
    
    
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).parent().children().find('.level').removeClass('highlight');
        $(this).addClass('selected');
        $(this).children().find('.level').addClass('highlight');
        var val = $(this).attr('data-value');
        //alert(val);
        
        $(this).parent().find('input').val(val);
    });
});
    </script>


<style>
    .radio-group{
    border:solid 1px grey;
    }
    
    .radio{
      
        
        border: 2px solid lightblue;
        cursor:pointer;
        margin: 2px 0; 
    }
    
    .radio.selected{
        border-color: #0f2f4a;
    }
    .level{
        background-color: #3c8dbc;
        color: white;
        font-weight: bold;
        display: inline;
        text-align: left;
        
        
    }
    .highlight{
        background-color: #0f2f4a;
    }
    header{
        background-color: grey;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        color: white;
    }
    .myrow{
        margin-left: 0px !important;
    }
    </style>

    


@section('content')
  

<div class="w3-row">
    
    <div class="w3-col s12  " >
      <div class="w3-panel w3-card-2" style="background-color: white;">
    
    <br>
      <h4 style="color: slategray;"><span><i class="mdi mdi-account-convert"> </i> </span>Competency Assignment - <b>{{$profile->firstname}} {{$profile->middlename}} {{$profile->surname}}</b></h4>
    <hr>
    <br>
    <div class="container-fluid" >
        <div class="row justify-content-center mt-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-0  mb-2">
                <div class="cardd px-0  pb-0  mb-3">
                    
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <span id="msform">
                                <!-- progressbar -->
                             
                                <ul id="progressbar" >
                                    <li class="active" id="account"><strong>Professional</strong></li>
                                    <li id="personal"><strong>Ethics</strong></li>
                                    <li id="payment"><strong>Efficient</strong></li>
                                    <li id="confirm"><strong>Responsive</strong></li>
                                </ul> <!-- fieldsets -->
                                @if ($existing)
                                {!! Form::open(['action' => ['CompetencyAssignmentController@update',$profile], 'method' => 'POST'])!!}
                                    {{method_field('PUT')}}
                                @else
                                {!! Form::open(['action' => ['CompetencyAssignmentController@store'], 'method' => 'POST'])!!}
 
                                @endif
                                                               
                                <fieldset>
                                 
                                <input type="hidden" name="email" value="{{$profile->email}}">
                                <input type="hidden" name="user_id" value="{{$profile->id}}">
                               
                                <h2 class="fs-title">Professional</h2>
                                    @foreach ($pcompetencies as $pcompetency)
                                <div class="radio-group" id="d{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $pcompetency->competency)}}">
                                        <header class="header">{{$pcompetency->competency}}</header>
                                    @foreach ($professional as $professionals)

                                    @if ($professionals->competency_id == $pcompetency->competency)


                                    
                                      <div class='radio col' data-value="{{$professionals->level_value}}">
                                          <div class="row myrow">
                                              <div class="col-md-2 level">
                                                {{$professionals->level_id}}
                                              </div>
                                              <div class="col-md-10">
                                                {{$professionals->description}}
                                              </div>
                                          </div>
                                         
                                        </div>
                                     
                                        @endif
                                        
                                        @endforeach
                                        <input type="hidden"  name="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $pcompetency->competency)}}" id="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $pcompetency->competency)}}" onchange="reversal(this.value, this.id)"/>
                                    </div>
                                    <br>
                                        @endforeach

                                    <input type="button" name="next" class="next action-button" value="Next" onclick="topFunction()" />
                                </fieldset>



                                <fieldset>
                                    
                                        <h2 class="fs-title">Ethics</h2>
                         
                                    @foreach ($ethcompetencies as $ethcompetency)
                                        
                                        <div class="radio-group" id="d{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $ethcompetency->competency)}}">
                                            <header class="header">{{$ethcompetency->competency}}</header>
                                            @foreach ($ethics as $ethic)
    
                                        @if ($ethic->competency_id == $ethcompetency->competency)
    
    
                                        
                                          <div class='radio col' data-value="{{$ethic->level_value}}">
                                              <div class="row myrow">
                                                  <div class="col-md-2 level">
                                                    {{$ethic->level_id}}
                                                  </div>
                                                  <div class="col-md-10">
                                                    {{$ethic->description}}
                                                  </div>
                                              </div>
                                             
                                            </div>
                                         
                                            @endif
                                            
                                            @endforeach
                                      
                                            <input type="hidden"  name="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $ethcompetency->competency)}}" id="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $ethcompetency->competency)}}" onchange="reversal(this.value, this.id)" />
                                    </div>
                                        <br>
                                    

                                    
                                    
                                    @endforeach
                                    
                                       
                                   <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="topFunction()" /> <input type="button" name="next" class="next action-button" value="Next" onclick="topFunction()" />
                                </fieldset>



                                <fieldset>
                                    <h2 class="fs-title">Efficient</h2>
                               
                                        @foreach ($effcompetencies as $effcompetency)
                                        
                                 
                                              <div class="radio-group" id="d{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $effcompetency->competency)}}">
                                                  <header class="header">{{$effcompetency->competency}}</header>
                                                  @foreach ($efficiency as $efficient)
          
                                              @if ($efficient->competency_id == $effcompetency->competency)
          
          
                                              
                                                <div class='radio col' data-value="{{$efficient->level_value}}">
                                                    <div class="row myrow">
                                                        <div class="col-md-2 level">
                                                          {{$efficient->level_id}}
                                                        </div>
                                                        <div class="col-md-10">
                                                          {{$efficient->description}}
                                                        </div>
                                                    </div>
                                                   
                                                  </div>
                                               
                                                  @endif
                                                  
                                                  @endforeach
                                                  <input type="hidden"  name="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $effcompetency->competency)}}" id="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $effcompetency->competency)}}" onchange="reversal(this.value, this.id)" />
                                              </div>
                                              <br>
                                          
      


                      
                                    
                                 
                                    @endforeach
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="topFunction()" /> <input type="button" name="make_payment" class="next action-button" value="Next" onclick="topFunction()" />
                                </fieldset>







                                <fieldset>
                                    <h2 class="fs-title ">Responsive</h2>
                                   
                                         @foreach ($rescompetencies as $rescompetency)
                               
                                        <div class="radio-group" id="d{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $rescompetency->competency)}}">
                                            <header class="header">{{$effcompetency->competency}}</header>
                                        @foreach ($responsive as $response)

                                        @if ($response->competency_id == $rescompetency->competency)
                                        <div class='radio col' data-value="{{$response->level_value}}">
                                            <div class="row myrow">
                                                <div class="col-md-2 level">
                                                  {{$response->level_id}}
                                                </div>
                                                <div class="col-md-10">
                                                  {{$response->description}}
                                                </div>
                                            </div>
                                           
                                          </div>
                                        @endif
                                            
                                        @endforeach
                                        
                                       
                                        <input type="hidden"  name="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $rescompetency->competency)}}" id="{{preg_replace('/[^a-zA-Z0-9-\.]/', '_', $rescompetency->competency)}}" onchange="reversal(this.value, this.id)"/>
                                    </div>
                                    <br>
                               
         
                                    @endforeach
                                    <span id="err" style="display:none; color:red; font-weight:bold; font-size:14px; text-align:center"></span>
                                    <br>
                                   <input type="button" name="previous" class="previous action-button-previous" onclick="topFunction()" value="Previous" /> <input type="submit" name="submit" class="action-button" value="Submit" />

                                    
                    
                                </fieldset>
                               
                                {!! Form::close() !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
   
    </div>
    </div>
    
  </div>

  <script>
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
    <script type="text/javascript">
    var existing = {!!json_encode($existing)!!}
    existing.forEach(element => {
        var competency = (element.competency).replace(/[^A-Z0-9]+/ig,"_");
        //document.getElementById(competency).value = element.value;
        var id = '#'+competency;
        $(id).val(element.value)
        $(id).trigger("onchange")
    });
    
    
    </script>
   
@endsection