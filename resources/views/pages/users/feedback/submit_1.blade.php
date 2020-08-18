@extends('layouts.app')
@section('header')
  Submit Feedback  
@endsection
@section('content')
    
<style>
.request{
  margin-bottom: 10px;
  padding: 5px 2px 5px 2px;
}
.completed{
  padding: 8px !important;
  text-align: center
}
button{
  padding: 10px 2px 5px 2px;
}
  </style>

<div class="col">

    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" data-toggle="tab" href="#new">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#completed">Completed</a>
      </li>
      
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="new" class="container tab-pane active"><br>
      
  <div class="col-md-12" >
    <div class="card-body">
        <div class="row">
            <div class="col">
              @if (count($feedbacks)==0)
                  <p>You have no pending feedback requests</p>
              @else
                  
            @foreach ($feedbacks as $feedback)
                
            {!! Form::open(['action' => ['SubmitFeedbackFormController@show', $feedback->id], 'method' => 'GET'])!!}
            
        <div class="d-flex col-lg-4 col-md-6 col-sm-12 request">
          <div class="col">
          <button type="submit" class="bg-primary col-md-11"  >
            <b>{{$feedback->name}} </b>
            <p style="font-size: 11px;">Submitted on {{$feedback->created_at}}</p>
        
   
        <input type="hidden" name="id" value="{{$feedback->id}}">
      </div>
      
      </button>
    
            </div>
   
    
         {!! Form::close() !!}
    @endforeach
    @endif
    </div></div>
    </div>
  </div>
    
        
      </div>
      <div id="completed" class="container tab-pane fade"><br>
        <div class="col-md-12" >
          <div class="card-body">
              <div class="row">
                  <div class="col">
                    @if (count($completed) == 0)
                        <p> You have not completed any feedbacks</p>
                    @else
                        
                   
                  @foreach ($completed as $complete)
                  
              <div class="d-flex col-lg-4 col-md-6 col-sm-12">
                <div class="col">
                <span class="bg-gray border-color-default col-md-11 completed">
                  <b>{{$complete->name}} </b>
                  <p style="font-size: 11px;"><i>Completed on {{$complete->updated_at}}</i></p>

            </div>
            
            </button>
          
            </div>

                @endforeach

                @endif
          </div>
        </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>

@endsection