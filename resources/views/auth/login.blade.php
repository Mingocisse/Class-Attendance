@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card align-items-center" style="border-radius: 1rem;">
          <div class="row ">
            
            <div class="col-md-12   ">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{route('login')}}">
                  @csrf
                  
                  <div class="d-flex flex-column align-items-center mb-4 pl-1">
                    <img  src="{{asset('images/logo_GIMPS2.png')}}" alt="">
                  </div>
                  <h3 class="fw-bold mb-2 text-uppercase justify-content-center">Class Attendance System</h3>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
                  <div class="pt-1-mb-4">
                    <p class="mb-0">Don't have an account? <a href="{{route('register')}}">Register</a></p>
                  </div>
                  {{-- <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('register')}}"
                      style="color: #393f81;">Register here</a></p> --}}
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
