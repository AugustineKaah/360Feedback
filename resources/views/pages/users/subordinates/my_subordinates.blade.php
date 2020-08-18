@extends('layouts.app')
@section('header')
  My Subordinates  
@endsection
@section('content')
   
                      <div class="col-12">
                      <div class="col">
                        
                        <table class="table table-striped">
                            <thead>
                              <tr style="bg-primary">
                                <th><b>Employee ID</b></th>
                                <th><b>Name</b></th>
                                <th><b>Job Title</b></th>
                                <th><b>Grade</b></th>
                                <th></th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{$profile->employee_id}}</td>
                                    <td>{{$profile->firstname}}&nbsp;{{$profile->middlename}}&nbsp;{{$profile->surname}}</td>
                                    <td>{{$profile->job_title}}</td>
                                    <td>{{$profile->grade}}</td>
                                    <td>
                                      {!! Form::open(['action' => ['MyProfileController@mySubsView',$profile->id], 'method' => 'GET'])!!}
                                      <button type="submit" class="btn btn-outline-success btn-sm" >View Profile</button>
                                      {!! Form::close() !!}
                                    </td>
                                    <td>
                                      {!! Form::open(['action' => ['CompetencyAssignmentController@show',$profile->id], 'method' => 'GET'])!!}
                                      <button type="submit" class="btn btn-outline-success btn-sm" >Competency Assignment</button>
                                      {!! Form::close() !!}
                                    </td>
                                    <td>
                                      {!! Form::open(['action' => ['SubmitFeedbackFormController@subordinate_feedback',$profile->id], 'method' => 'GET'])!!}
                                      <button type="submit" class="btn btn-outline-success btn-sm" >Submit Feedback</button>
                                      {!! Form::close() !!}
                                    </td>

                                </tr>
                                @endforeach
                              
                             
                            </tbody>
                          </table>
                        
                      </div>
                      </div>

                  


@endsection

