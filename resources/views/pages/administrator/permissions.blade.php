@extends('layouts.app')
@section('header')
    Permissions
@endsection
@section('content')

<style>
form{
    margin: 0;
}
form >button >i{
    height: 15;
}
form >button{
    border: none;
    background: transparent
}
</style>
<ul class="nav nav-tabs" id="permissionsList" role="tablist">
    <li class="nav-item active">
      <a class="nav-link active" id="administrators-tab" data-toggle="tab" href="#administrators" role="tab" aria-controls="administrators" aria-selected="true">Administrators</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="managers-tab" data-toggle="tab" href="#managers" role="tab" aria-controls="managers" aria-selected="false">Managers</a>
    </li>

  </ul>
  <div class="tab-content" id="permissionsTabContent">
    <div class="tab-pane active" id="administrators" role="tabpanel" aria-labelledby="administrators-tab">
       <table class="table">
        <thead>
            <th>Name</th>
            <th>Job Title</th>
            <th>Department</th>
            <th>Delete</th>
           
        </thead>
        <tbody>
            @foreach ($administrators as $administrator)
                <tr>
                    <td>{{$administrator->name}}</td>
                <td>{{$administrator->job_title}}</td>
                <td>{{$administrator->department_id}}</td>
                <td>
                    {!! Form::open(['action' => ['PermissionsController@destroy', $administrator->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
        
                            
                            <button type="submit" id="delete" onclick="return confirm('Revoke permission?')">
                                <i class="fa fa-trash menu-icon delete"></i>
                            </button>
                        {!! Form::close() !!}
                </td>
                <td></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right"><span class="btn btn-primary" data-toggle="modal" data-target="#permissionModal" data-role="Administrator">Add</span></td>
            </tr>
        </tfoot>
    </table>
    </div>
    <div class="tab-pane fade" id="managers" role="tabpanel" aria-labelledby="managers-tab">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Job Title</th>
                <th>Department</th>
                <th>Delete</th>
                
            </thead>
            <tbody>
                @foreach ($managers as $manager)
                    <tr>
                        <td>{{$manager->name}}</td>
                    <td>{{$manager->job_title}}</td>
                    <td>{{$manager->department_id}}</td>
                    <td>
                        {!! Form::open(['action' => ['PermissionsController@update', $manager->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'PUT')}}
        
                            
                            <button type="submit" id="delete" onclick="return confirm('Revoke permission?')">
                                <i class="fa fa-trash menu-icon delete"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                    <td></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right"> <span class="btn btn-primary" data-toggle="modal" data-target="#permissionModal" data-role="Manager">Add</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
  </div>

  <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="permissionModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['action' => ['PermissionsController@store'], 'method' => 'POST'])!!}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" name="username" id="username" class="form-control " placeholder="Enter name of staff" autocomplete="off"/>
                <input type="hidden" name="user_id" id="user_id">
                <div id="userList" style="position:absolute">
                </div>  
            
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Department:</label>
              <input type="text" class="form-control" name="department" id="department" readonly>
            </div>
            <input type="hidden" id="role" name="role">
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Grant Permission</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <script>
  $('#permissionModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('role')
  var modal = $(this)
  modal.find('.modal-title').text('Add ' + recipient)
  modal.find('#role').val(recipient)
})

function getDepartment(obj) {
 var department = obj.options[obj.selectedIndex].getAttribute('data');
 document.getElementById('department').value = department;
 
}
  </script>

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
        });
    
        $(document).on('click', 'li', function(){  
            $('#username').val($(this).text());
            $('#user_id').val($(this).attr('id')); 
            $('#department').val($(this).attr('data-department'));   
            $('#userList').fadeOut();  
        });  
    
    });
    </script>

@endsection