
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">







<div class="bg">

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <header class="card-title bg-info text-white text-center font-weight-bold">Competency Assessment</header>
            <h5 class="text-center font-weight-bold">Login</h5>
            <div class="card-body">
            

            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf


                


                <div class="form-label-group">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" autofocus>
                        <label for="email" >{{ __('email') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>

                <div class="form-label-group">
          
                    
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                        <label for="password">{{ __('password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="custom-control-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>

              
          </div>
        </div>
      </div>
    </div>
  </div>

</div>