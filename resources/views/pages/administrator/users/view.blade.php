@extends('layouts.app')
@section('header')
  View User  
@endsection
@section('content')
    
<h4 class="card-title">{{$user->name}}</h4>
                    <hr>
                    {!! Form::open(['action' => ['UsersController@edit',$user->id], 'method' => 'GET'])!!}

                      <div class="row">
                        
                        
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label>Firstname :</label>
                             
                            <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" readonly>
                             
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Middlename :</label>
                              
                                <input type="text" class="form-control" name="middlename" value="{{$user->middlename}}" readonly>
                              
                            </div>
                          </div>



                          <div class="col-md-4">
                            <div class="form-group ">
                              <label >Surname :</label>
                          
                                <input type="text" class="form-control" name="surname" value="{{$user->surname}}" readonly>
                              
                             
                            </div>
                          </div>
                        
                      </div>




                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label >Email :</label>
                            
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                            
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Phone Number :</label>
                            
                                <input type="text" class="form-control" name="phone_number" value="{{$user->mobile_number}}" readonly>
                             
                             
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label >Employee ID :</label>
                              
                                <input type="text" class="form-control" name="employee_id" value="{{$user->employee_id}}" readonly>
                           
                             
                            </div>
                          </div>

                        
                      </div>



                      <div class="row">
                        

                        <div class="col-md-3">
                            <div class="form-group ">
                              <label >Job Title :</label>
                         
                                <input type="text" class="form-control" name="job_title" value="{{$user->job_title}}" readonly>
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Department :</label>
                              
                                <input type="text" class="form-control" name="department" value="{{$user->department_id}}" readonly>
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Grade Level :</label>
                             
                                <input type="text" class="form-control" name="grade_level" value="{{$user->grade}}" readonly>
                              
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label >Manager :</label>
                         
                                <input type="text" class="form-control" name="manager" value="{{$user->manager}}" readonly>
                              
                             
                            </div>
                          </div>
                          
                        
                      </div>


                    <div class="row">
                        <input type="submit" value="Edit" class="btn btn-info">
                    </div>
                     

                    {!! Form::close() !!}
                  </div>
                </div>


@endsection