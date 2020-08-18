@extends('layouts.app')
@section('header')
  New User  
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{'UsersController@store'}}">
                        @csrf


                        <div class="row">
                        
                        
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group ">
                                <label>Firstname :</label>
                               
                                  <input type="text" onchange="fullname()" class="form-control" placeholder="firstname" id="firstname" name="firstname"  required autocomplete="firstname">
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                               
                              </div>
                            </div>
  
  
  
  
  
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group ">
                                <label >Middlename :</label>
                                
                                  <input type="text" onchange="fullname()" id="middlename" class="form-control" placeholder="middlename" name="middlename"  autocomplete="middlename">
                                
                              </div>
                            </div>
  
  
  
                            <div class="col-md-4 col-sm-12">
                              <div class="form-group ">
                                <label >Surname :</label>
                            
                                  <input type="text" onchange="fullname()" class="form-control" id="surname" placeholder="Surname" name="surname"  required autocomplete="surname">
                                
                               
                              </div>
                            </div>
                          
                        </div>
  
  
  
  
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                <label >Email :</label>
                              
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                               
                              </div>
                            </div>
  
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                  <label >Password :</label>
                                
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror                                
                                 
                                </div>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                  <label >Confirm Password :</label>
                                
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                                
                                 
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                              <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                                  </div>
                              </div>

                              <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                             
  
                        </div>  




                        
                    </form>
                </div>
            </div>
        </div>
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