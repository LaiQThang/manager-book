<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
    rel="stylesheet"
    />
    <title>Login</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style=" height:100vh; background-color:#ccc">
       <!-- Pills navs -->
    <div style="background-color: #fff; padding: 40px; border-radius: 8px">
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
            aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
            aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
        </ul>
      <!-- Pills navs -->
      
      <!-- Pills content -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
          @if (session('msg'))
              <div class="alert alert-warning">{{session('msg')}}</div>
          @endif
          <form method="post" action="{{route('auth.login')}}">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">Email or username</label>
            </div>
      
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="loginPassword" class="form-control" />
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

            @csrf
      
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      
            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a href="#!">Register</a></p>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
          <form method="post" action="{{route('auth.register')}}">
            <!-- Name input -->
            @error('full_name')
                      <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
            @enderror
            <div class="form-outline mb-4">
              <input type="text" name="full_name" id="registerName" class="form-control" />
              <label class="form-label" for="registerName">Name</label>
            </div>
    
            <!-- Email input -->
            @error('email')
                      <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
            @enderror
            <div class="form-outline mb-4">
              <input type="text" name="email" id="registerEmail" class="form-control" />
              <label class="form-label" for="registerEmail">Email</label>
            </div>
      
            <!-- Password input -->
            @error('password')
            <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
            @enderror
            <div class="form-outline mb-4">
              <input type="password" name="password" id="registerPassword" class="form-control" />
              <label class="form-label" for="registerPassword">Password</label>
            </div>
      
            <!-- Repeat Password input -->
              @error('password_confirm')
              <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
              @enderror
            <div class="form-outline mb-4">
              <input type="password" name="password_confirm" id="registerRepeatPassword" class="form-control" />
              <label class="form-label" for="registerRepeatPassword">Repeat password</label>
            </div>
      
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" name="check" type="checkbox"  id="registerCheck" checked
                aria-describedby="registerCheckHelpText" />
              <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
              </label>
            </div>
            @csrf
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
          </form>
        </div>
      </div>
    </div>
  <!-- Pills content -->
    </div>

    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
    ></script>
</body>
</html>