@extends('layouts.app')
@section('header')
    Permissions
@endsection
@section('content')

<div class="container box">
    <h3 >Ajax Autocomplete Textbox in Laravel using JQuery</h3><br />
    
    <div class="form-group">
     <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Enter Country Name" />
     <input type="text" name="user_id" id="user_id">
     <div id="userList">
     </div>
    </div>
    {{ csrf_field() }}
   </div>
 
 
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
         $('#user_id').val($(this).attr('data-department'));  
         $('#userList').fadeOut();  
     });  
 
 });
 </script>


@endsection