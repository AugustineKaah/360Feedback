@extends('layouts.app')

@section('content')
    
<h4 class="card-title">{{$profile->name}}</h4>
                    <hr>
              

                      <div class="row">
                        
                        
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label>Firstname :</label>
                             
                            <input type="text" class="form-control" name="firstname" value="{{$profile->firstname}}" readonly>
                             
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Middlename :</label>
                              
                                <input type="text" class="form-control" name="middlename" value="{{$profile->middlename}}" readonly>
                              
                            </div>
                          </div>



                          <div class="col-md-4">
                            <div class="form-group ">
                              <label >Surname :</label>
                          
                                <input type="text" class="form-control" name="surname" value="{{$profile->surname}}" readonly>
                              
                             
                            </div>
                          </div>
                        
                      </div>




                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label >Email :</label>
                            
                                <input type="text" class="form-control" name="email" value="{{$profile->email}}" readonly>
                            
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Phone Number :</label>
                            
                                <input type="text" class="form-control" name="phone_number" value="{{$profile->mobile_number}}" readonly>
                             
                             
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label >Employee ID :</label>
                              
                                <input type="text" class="form-control" name="employee_id" value="{{$profile->employee_id}}" readonly>
                           
                             
                            </div>
                          </div>

                          
                        
                      </div>



                      <div class="row">
                        





                        <div class="col-md-3">
                            <div class="form-group ">
                              <label >Job Title :</label>
                         
                                <input type="text" class="form-control" name="job_title" value="{{$profile->job_title}}" readonly>
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Department :</label>
                              
                                <input type="text" class="form-control" name="department" value="{{$profile->department_id}}" readonly>
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Grade Level :</label>
                             
                                <input type="text" class="form-control" name="grade_level" value="{{$profile->grade}}" readonly>
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label >Manager :</label>
                         
                                <input type="text" class="form-control" name="manager" value="{{$profile->manager}}" readonly>
                              
                             
                            </div>
                          </div>



                          
                        
                      </div>



                      <div class="row">
                        <div class="col-md-12">
                      <button class="btn btn-danger" onclick="window.location.replace('/my_subordinates')">Back</button>
                        </div>

                    </div>

                
                  </div>
                </div>


@endsection