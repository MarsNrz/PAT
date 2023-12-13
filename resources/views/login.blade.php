<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website CV</title>

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  
  
</head>
<body class="hold-transition login-page">

<div class="container">
 <div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="form">
  
    <div class="card-body">

      <p class="login-box-msg1" style="margin-top:10px; margin-bottom:35px;">

        Welcome to our App!
      </p>
      @if(session('login_error'))
            <div class="alert alert-danger"  style="color: red;">
              {{ session('login_error') }}
            </div>
          @endif

          @if(session('email_error'))
            <div class="alert alert-danger" style="color: red;">
              {{ session('email_error') }}
            </div>
          @endif

          @if(session('password_error'))
            <div class="alert alert-danger" style="color: red;">
              {{ session('password_error') }}
            </div>
          @endif
      <form action="/loginproses" method="post">
      @csrf
      <label for="email" style="color: black; font-weight: bold;">
        Email
      </label>
        <div class="input-group mb-3"style="margin-top: 5px; margin-bottom: 15px;">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
            <label for="password" style="color: black; font-weight: bold;;">Password</label>
          <div class="input-group mb-3"  style="margin-top: 5px; margin-bottom: 5px;"> <!-- Atur margin-top sesuai keinginan Anda -->
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>  
            @error('password')
              <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="signin-container">
      <button type="submit" class="btn btn-primary btn-block" style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">SIGN IN</button>
      <p class="signup-link" style="color: black;">
        Don't have account?
        <a href="/register" style="color: black; font-weight:bold;">SIGN UP</a>
      </p>
    </div>
  </div>
</div>
        </div>
      </form>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
</div>
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
