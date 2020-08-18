@extends('layouts.app')
@section('header')
  Edit Profile  
@endsection
@section('content')


                    {!! Form::open(['action' => ['MyProfileController@update',$user->id], 'method' => 'POST'])!!}
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
                              <label >Department/Unit :</label>
                            {{-- <input list="departments" class="form-control" value="{{$user->department_name}}" data-id="{{$user->department_id}}" onchange="testFunc(this)">
                            <input type="hidden" name="department" id="department" value="{{$user->department_id}}"> --}}
                               <select name="department" id="department" class="form-control" onchange="testFunc(this)">
                                  @foreach ($departments as $department)
                                      <option value="{{$department->department_id}}" {{$department->department == $user->department_name ? 'selected':''}}>{{$department->department}}</option>
                                  @endforeach
                               </select>
                             
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
                            <input type="text" name="username" id="username" class="form-control " value="{{$user->manager_name}}" placeholder="Enter name of manager" autocomplete="off"/>
                            <input type="hidden" name="manager" id="manager" value="{{$user->manager}}" >
                                <div id="userList" style="position:absolute">
                               
                          </div>
                          
                        
                      </div>
                      </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-info">
                        <input type="button" value="Cancel" class="btn btn-danger" onclick="window.location.replace('/myprofile')">
                    </div>
                    </div>
                     
                    <input type="hidden" name="name" id="name" value="{{$user->name}}">
                    {!! Form::close() !!}
                
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
                              $('#manager').val($(this).attr('id'));  
                              $('#userList').fadeOut();  
                          });  
                      
                      });
                      </script>             

<script>
  function testFunc(param) {
    //var kon = param.getAttribute('data-id');
    console.log(param);
  }
</script>

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

