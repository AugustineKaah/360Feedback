@extends('layouts.app')
@section('header')
  Submit Feedback  
@endsection
@section('content')
 



@if (count($competencies_professional)==0)
    <h5><b>{{$user}}</b> does not have any competencies assigned. Kindly come back later</h5>
@else


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
 
    
     {
        text-align: center;
        position: relative;
        margin-top: 20px
    }
    
     fieldset .form-card {
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
    
     fieldset {
        background:transparent;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }
    
     fieldset:not(:first-of-type) {
        display: none
    }
    
     fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }
    
     input,
     textarea {
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
    
     input:focus,
     textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid green;
        outline-width: 0
    }
    
     .action-button {
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
    
     .action-button:hover,
     .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
    }
    
     .action-button-previous {
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
    
     .action-button-close {
        width: 100px;
        background: #e0595d;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }
    

     .action-button-previous:hover,
     .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

     .action-button-close:hover,
     .action-button-close:focus {
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
    



    .radio-group {
        position: relative;
        margin-bottom: 25px
    }
    
    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }
    
    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }
    
    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }
    
    .fit-image {
        width: 100%;
        object-fit: cover
    }
    
    td{
        border-style: solid;
        border-color: lightblue;

    }
    
    </style>
                                    
                                    <script type='text/javascript'>$(document).ready(function(){

//slider value setting


$('.slidecontainer .slider').change(function(){ 
var myvalue = $(this).val();
    $(this).parent().find('.score').val(myvalue);
    var myword='';
    switch (myvalue) { 
	case '0': 
		myword = 'N/A';
		break;
	case '1': 
		myword = 'Never';
		break;
	case '2': 
		myword = 'Rarely';
		break;		
	case '3': 
		myword = 'Sometimes';
		break;
    case '4': 
		myword = 'Usually';
		break;
    case '5': 
		myword = 'Always';
		break;
	default:
		myword = '';
    }
    
    $(this).parent().find('.display').text(myword);
    
});

    
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
    
    $(".submit").click(function(){
    return false;
    })
    
    });</script>









<h4 style="color: slategray;"><span><i class="mdi mdi-account-convert"> </i> </span> Competency Assesment - <b>{{$user}}</b></h4>
<hr>
<br>
<div class="container-fluid" >
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-0  mb-2">
            <div class="cardd px-0  pb-0  mb-3">
                
                <div class="row">
                    <div class="col-md-12 mx-0">
                        {!! Form::open(['action' => ['SubmitFeedbackFormController@store'], 'id'=>'msForm', 'method' => 'POST'])!!}
                    <input type="hidden" name="feedback_id" value="{{$feedback_id}}">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                            <!-- progressbar -->
                         
                            <ul id="progressbar" >
                                <li class="active" id="account"><strong>Profesional</strong></li>
                                <li id="personal"><strong>Ethics</strong></li>
                                <li id="payment"><strong>Efficient</strong></li>
                                <li id="confirm"><strong>Responsive</strong></li>
                            </ul> <!-- fieldsets -->
                        
                            <fieldset>
                              
                                    
                                
                            <h3 class="fs-title">Professional</h3>
                               
                                
                                    
                                
                                <div class="form-cardd row" >
                                                    
                                    <br>
                                    
                                    <?php
                                    $count=1
                                    ?>
                                    <table style="border-collapse:separate; border-spacing:10px;">
                                        <tr>

                                    @foreach ($competencies_professional as $competency_professional)
                                    
                                    <?php
                                        $count++
                                        ?>
                                    @if ($count == 5)
                                    </tr><tr>
                                    @endif
                                    <td style="width:33.3%">
                                  <div class="" style="padding-bottom:40px; height:100% !important">
                                  <div  style="">
                                 
                                  <div class="w3-panel  text-center" >
                                  <br>
                                  <p><b>{{$competency_professional->competency}}</b></p>
                                  <p>{{$competency_professional->description}}</p>
                                                                   
                                  <br>
                                  <br>
                                  <div class="slidecontainer">
                                    <input type="range" min="0" max="5" value="0" class="slider" id="myRange">
                                    <p>Value: <span class="display"></span></p>
                                    <input type="hidden" name="{{$underscore_name = str_replace(' ', '_',$competency_professional->competency)}}" class="score">
                                  </div>
                                  
                                  
                                  </div>
                                  
                                  </div>
                                  </div>
                                    </td>
                                
                                @endforeach
                                </table>
                                </div>
                                <input type="button" value="Close" class="action-button-close " onclick="history.back()"> 
                                <input type="button" name="next" class="next action-button" value="Next" onclick="topFunction()" />
                                
                            </fieldset>
                            <fieldset>
                                <div class="form-cardd">
                                    <h2 class="fs-title">Ethics</h2>
                                    <br>
                                    <div class="form-cardd row" >
                                                    
                                        <br>
                                        <?php
                                     $count=1
                                     ?>
                                     <table style="border-collapse:separate; border-spacing:10px;">
                                        @foreach ($competencies_ethics as $competency_ethics)
                                        <?php
                                        $count++
                                        ?>
                                    @if ($count == 5)
                                     </tr><tr>
                                    @endif
                                    <td style="width:33.3%">
                                        <div class="" style="padding-bottom:40px; height:100% !important">
                                        <div  style="">
                                      <div class="w3-panel  text-center" >
                                      <br>
                                      <p><b>{{$competency_ethics->competency}}</b></p>
                                      <p>{{$competency_ethics->description}}</p>
                                      <br>
                                      <br>
                                      <div class="slidecontainer">
                                        <input type="range" min="0" max="5" value="0" class="slider" id="myRange">
                                        <p>Value: <span class="display"></span></p>
                                        <input type="hidden" name="{{$underscore_name = str_replace(' ', '_',$competency_ethics->competency)}}" class="score">
                                      </div>
                                      </div>
                                      </div>
                                      </div>
                                    </td>
                                    @endforeach
                                </table>
                                    </div> 
                                </div>
                                    <input type="button" value="Close" class="action-button-close " onclick="history.back()"> 
                                 <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="topFunction()" /> <input type="button" name="next" onclick="topFunction()" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Efficiency</h2>
                                <div class="form-cardd">
                                    
                                    <br>
                                    <div class="form-cardd row" >
                                                    
                                        <br>
                                        <?php
                                        $count=1
                                        ?>
                                        <table style="border-collapse:separate; border-spacing:10px;">
                                        @foreach ($competencies_efficiency as $competency_efficiency)
                                        <?php
                                        $count++
                                        ?>
                                    @if ($count == 5)
                                        </tr><tr>
                                    @endif
                                    <td style="width:33.3%">
                                        <div class="" style="padding-bottom:40px; height:100% !important">
                                        <div  style="">
                                      <div class="w3-panel  text-center" >
                                      <br>
                                      <p><b>{{$competency_efficiency->competency}}</b></p>
                                      <p>{{$competency_efficiency->description}}</p>
                                      <br>
                                      <br>
                                      <div class="slidecontainer">
                                        <input type="range" min="0" max="5" value="0" class="slider" id="myRange">
                                        <p>Value: <span class="display"></span></p>
                                        <input type="hidden" name="{{$underscore_name = str_replace(' ', '_',$competency_efficiency->competency)}}" class="score">
                                      </div>
                                      </div>
                                      </div>
                                      </div>
                                    </td>
                                    @endforeach
                                </table>
                                    </div>
                                    </div> 
                                    <input type="button" value="Close" class="action-button-close " onclick="history.back()"> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="topFunction()" /> <input type="button" name="make_payment" class="next action-button" value="Next" onclick="topFunction()" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title ">Responsive</h2>
                                <div class="form-cardd">
                                     <br>
                                     <div class="form-cardd row" >
                                                    
                                       
                                        <?php
                                        $count=1
                                        ?>
                                        <table style="border-collapse:separate; border-spacing:10px;">
                                        @foreach ($competencies_responsive as $competency_responsive)
                                        <?php
                                        $count++
                                        ?>
                                        
                                    @if ($count == 5)
                                        </tr><tr>
                                    @endif
                                    <td style="width:33.3%">
                                        <div class="" style="padding-bottom:40px; height:100% !important">
                                        <div  style="">
                                     
                                      <div class="w3-panel  text-center" >
                                      <br>
                                      <p><b>{{$competency_responsive->competency}}</b></p>
                                      <p>{{$competency_responsive->description}}</p>
                                      <br>
                                      <br>
                                      <div class="slidecontainer">
                                        <input type="range" min="0" max="5" value="0" class="slider" id="myRange">
                                        <p>Value: <span class="display"></span></p>
                                        <input type="hidden" name="{{$underscore_name = str_replace(' ', '_',$competency_responsive->competency)}}"  class="score">
                                      </div>
                    
                                      </div>
                                      </div>
                                      </div>
                                      
                                    </td>
                                                                         @endforeach
                                </table>
                                     </div>
                                </div>
                                <input type="button" value="Close" class="action-button-close " onclick="history.back()"> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="topFunction()"/> <input type="submit" name="make_payment" class="next action-button" value="Submit" />
                            </fieldset>
                            {!! Form::close() !!}
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
    @endif

@endsection

