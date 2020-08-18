@extends('layouts.app');
@section('header')
Users 
@endsection
@section('content')
   
<h4 class="card-title">Users</h4>
                    <hr>
                    <div class="form-sample">
  
                      <div class="row">
                        
                        
                      </div>
                      



                      <div class="">
                      <div class="col">
                        {!! Form::open(['action' => ['UsersController@create'], 'method' => 'GET'])!!}
                        <input type="submit" class="btn btn-primary" value="New">
                        {!! Form::close() !!}
                        <table class="table">
                            <thead class="bg-blue">
                              <tr >
                                <th><b>Employee ID</b></th>
                                <th><b>Name</b></th>
                                <th><b>Job Title</b></th>
                                
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->employee_id}}</td>
                                    <td>{{$user->firstname}}&nbsp;{{$user->middlename}}&nbsp;{{$user->surname}}</td>
                                    <td>{{$user->job_title}}</td>
                                    
                                    <td>
                                      {!! Form::open(['action' => ['UsersController@show',$user->id], 'method' => 'GET'])!!}
                                      <button type="submit" class="btn btn-info btn-sm" >View</button>
                                      {!! Form::close() !!}
                                    </td>
                                    

                                </tr>
                                @endforeach
                               
                            </tbody>
                          </table>
                        
                      </div>
                      </div>

                      



@endsection

