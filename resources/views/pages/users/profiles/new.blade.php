@extends('layouts.app')

@section('content')
    
<h4 class="card-title">Employment Details</h4>
                    <hr>
                    {!! Form::open(['action' => ['MyProfileController@store'], 'method' => 'POST'])!!}
                      <p class="card-description"> Kindly fill in your employment details </p>
                      <div class="row">
                        
                        
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label>Firstname :</label>
                             
                                <input type="text" class="form-control" placeholder="firstname" name="firstname">
                             
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Middlename :</label>
                              
                                <input type="text" class="form-control" placeholder="middlename" name="middlename">
                              
                            </div>
                          </div>



                          <div class="col-md-4">
                            <div class="form-group ">
                              <label >Surname :</label>
                          
                                <input type="text" class="form-control" placeholder="Surname" name="surname">
                              
                             
                            </div>
                          </div>
                        
                      </div>




                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label >Email :</label>
                            
                                <input type="email" class="form-control" placeholder="email" name="email">
                            
                             
                            </div>
                          </div>





                        <div class="col-md-4">
                            <div class="form-group ">
                              <label >Phone Number :</label>
                            
                                <input type="text" class="form-control" placeholder="phone number" name="phone_number">
                             
                             
                            </div>
                          </div>



                          
                        
                      </div>



                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label >Employee ID :</label>
                              
                                <input type="text" class="form-control" placeholder="employee id" name="employee_id">
                           
                             
                            </div>
                          </div>





                        <div class="col-md-3">
                            <div class="form-group ">
                              <label >Job Title :</label>
                         
                                <input type="text" class="form-control" placeholder="job title" name="job_title">
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Department :</label>
                              
                                <input type="text" class="form-control" placeholder="department" name="department">
                              
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group ">
                              <label >Grade Level :</label>
                             
                                <input type="text" class="form-control" placeholder="grade level" name="grade_level">
                              
                             
                            </div>
                          </div>



                          
                        
                      </div>



                      <div class="row">


                      <div class="col-md-4">
                        <div class="form-group">
                          <label >Manager :</label>
                     
                            <input type="text" class="form-control" placeholder="manager" name="manager">
                          
                         
                        </div>
                      </div>

                    </div>

                     

                     
                      
                  
                     
                    
                      
                   
                   

                    <button type="submit" class="btn btn-success">Submit</button>
                    {!! Form::close() !!}
                  </div>
                </div>


@endsection