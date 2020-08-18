@extends('layouts.app')
@section('header')
  Edit User
@endsection
@section('content')
    
<h4 class="card-title">{{$user->name}}</h4>
                    <hr>
                    {!! Form::open(['action' => ['UsersController@update',$user->id], 'method' => 'POST'])!!}
                    {{method_field('PUT')}}
                   
                      <div class="row">
                        
                        
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label>Firstname :</label>
                             
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->firstname}}" onchange="fullname()" >
                             
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Middlename :</label>
                              
                                <input type="text" class="form-control" name="middlename" id="middlename" value="{{$user->middlename}}"  onchange="fullname()">
                              
                            </div>
                          </div>



                          <div class="col-md-4">
                            <div class="form-group ">
                              <label >Surname :</label>
                          
                                <input type="text" class="form-control" name="surname" id="surname" value="{{$user->surname}}"  onchange="fullname()">
                              
                             
                            </div>
                          </div>
                        
                      </div>




                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label >Email :</label>
                            
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" >
                            
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Phone Number :</label>
                            
                                <input type="text" class="form-control" name="mobile_number" value="{{$user->mobile_number}}" >
                             
                             
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label >Employee ID :</label>
                              
                                <input type="text" class="form-control" name="employee_id" value="{{$user->employee_id}}" >
                           
                             
                            </div>
                          </div>

                        
                      </div>



                      <div class="row">
                        

                        <div class="col-md-3">
                            <div class="form-group ">
                              <label >Job Title :</label>
                         
                                <input type="text" class="form-control" name="job_title" value="{{$user->job_title}}" >
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Department :</label>
                              
                                <input type="text" class="form-control" name="department" value="{{$user->department_id}}" >
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Grade Level :</label>
                             
                                <input type="text" class="form-control" name="grade_level" value="{{$user->grade}}" >
                              
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label >Manager :</label>
                         
                                <input type="text" class="form-control" name="manager" value="{{$user->manager}}" >
                              
                             
                            </div>
                          </div>
                          
                        
                      </div>


                    <div class="row">
                        <input type="submit" value="Save" class="btn btn-info">
                    </div>
                     
                    <input type="hidden" name="name" id="name" value="{{$user->name}}">
                    {!! Form::close() !!}
                  </div>
                </div>


@endsection

<script>
  function fullname(){
      var firstname = document.getElementById('firstname').value;
      var middlename = document.getElementById('middlename').value;
      var surname = document.getElementById('surname').value;
      var fullname = '';
      if(middlename){
          fullname = firstname + ' '+ middlename + ' '+surname;
      }
      else{
      fullname = firstname + ' '+surname;
      }
      document.getElementById('name').value = fullname;
  }
  
  </script>