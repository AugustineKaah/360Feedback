@extends('layouts.app')
@section('header')
  Request Feedback  
@endsection

@section('content')
 
                    <div class="row">
                      
                        <div class="col-lg-6 col-md-12">
                          <div class="bg-info card" style="padding:20px; border-radius:25px">
                          <h4 style="text-align:center" class="">Requests Made</h4>
                          <div class="row">
                            <div class="col-md-12"><br>
                            <table class="table table-bordered">
                              <thead >
                                <tr class="bg-info">
                                  <td>Feedback Provider</td>
                                  <td>Feedback Type</td>
                                  <td>Submission Date</td>
                                </tr>
                              </thead>
                              <tbody>
                          @foreach ($requests as $request)
                          
                                <tr>
                                  <td>{{$request->name}}</td>
                                  <td>{{$request->feedback_type}}</td>
                                <td>{{date("d/m/Y", strtotime($request->created_at))}}</td>
                                </tr>
                            
                          @endforeach
                        </tbody>
                      </table>
                
                    </div>
                        </div>  
                    </div>
                        </div>


                    <div class="col-lg-6 col-md-12">
                      <div class="card" style="padding:20px; border-radius:25px">
                      <h4 style="text-align:center">New Request</h4><br>
                      {!! Form::open(['action' => ['FeedbackController@store'], 'method' => 'POST'])!!}
                      <input type="hidden" name="employee_id" value="{{$employee_id}}">
                      <input type="hidden" name="id" value="{{$id}}">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label >Feedback Type</label>
                            <select class="form-control" name="feedback_type">
                              <option value="">Select</option>
                              <option value="Peer">Peer</option>
                              <option value="Top-Down">Top-Down</option>
                              <option value="Bottom-Up">Bottom-Up</option>
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                            <label>Feedback Provider</label>
                            <input type="text" name="username" id="username" class="form-control " placeholder="Enter name of staff" autocomplete="off"/>
                            <input type="hidden" name="feedback_provider" id="feedback_provider" >
                            <div id="userList" style="position:absolute">
                            </div> 
                           
                           
                              
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          {!! Form::close() !!}
                        </div>
                      </div>
                      </div> 
                    </div>
                    
                        
                      

                    <br>
                    <br>


            <script>
              $(document).ready(function(){
              
                $('#username').keyup(function(){ 
                      var query = $(this).val();
                      if(query != '')
                      {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                        url:"{{ route('autocomplete.fetch') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                          $('#userList').fadeIn();  
                                  $('#userList').html(data);
                        }
                        });
                      }
                      else{
                            $('#userList').fadeOut();
                          }
                      });
              
                  $(document).on('click', 'li', function(){  
                      $('#username').val($(this).text());
                      $('#feedback_provider').val($(this).attr('id'));  
                      $('#userList').fadeOut();  
                  });  
              
              });
              </script>
                          

@endsection