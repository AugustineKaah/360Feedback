@extends('layouts.app')

@section('content')

<div class="row">
          
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Department</h4>
          <hr>
          {!! Form::open(['action' => ['DepartmentsController@update', $department->department_id], 'method' => 'POST'])!!}
         
            <p class="card-description"> Add an additional department </p>
            <div class="row">
              
              
            </div>
            




            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Department Name</label>
                  <div class="col-sm-7">
                 
                 {{Form::text('department', $department->department, ['class'=>'form-control'])}} 
                  </div>
               
                </div>
              </div>
              
            </div>

            

           
            
        
           
          
            
         
      <div class="text-center">
          <input type="submit" class="btn btn-success" value="Submit">
      </div>
      @method('PUT')
      {{Form::hidden('_method', 'PUT')}}
      {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
    
@endsection