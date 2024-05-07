@extends('frontend.layout.master')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-4">
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login" role="tab"
            aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register" role="tab"
            aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
      </ul>
    
      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
          <form action="{{ route('login')}}" method="POST">
            @csrf 
      
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">Email or username</label>
            </div>
    
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="loginPassword" class="form-control" />
              <label class="form-label" for="loginPassword">Password</label>
            </div>
    
            <!-- 2 column grid layout -->
            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check mb-3 mb-md-0">
                  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck"> Remember me </label>
                </div>
              </div>
    
              <div class="col-md-6 d-flex justify-content-center">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>
    
            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign
              in</button>
    
            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a href="#!">Register</a></p>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
          <form action="{{route('signup')}}" method="POST">
@csrf
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" id="registerName" name="name" class="form-control" />
              <label class="form-label" for="registerName">Name</label>
            </div>
    
            <!-- Account Type input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <select name="account_type" id="accountType" id="" class="form-control">
                <option value="">Please Select Account Type</option>
                <option value="0">Individual</option>
                <option value="1">Bussiness</option>
              </select>
              
            </div>
    
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="registerEmail" name="email" class="form-control" />
              <label class="form-label" for="registerEmail">Email</label>
            </div>
    
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="registerPassword" name="password" class="form-control" />
              <label class="form-label" for="registerPassword">Password</label>
            </div>
    
            <!-- Repeat Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="registerRepeatPassword" name="confirm_password" class="form-control" />
              <label class="form-label" for="registerRepeatPassword">Repeat password</label>
            </div>
    
            
    
            <a type="submit" class="btn btn-primary btn-block mb-3">Sign
              UP</a>
          </form>
        </div>
      </div>
    
    </div>
  </div>


</div>
@endsection