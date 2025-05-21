<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <!-- Bootstrap 3 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f8f8;
        }
        .login-container {
            margin-top: 80px;
        }
        .login-panel {
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            border-radius: 4px;
        }
        .login-header {
            background-color: #337ab7;
            color: white;
            padding: 15px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .login-body {
            padding: 20px;
            background: white;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #337ab7;
            border: none;
            padding: 10px;
        }
        .btn-login:hover {
            background-color: #286090;
        }
        .forgot-password {
            margin-top: 10px;
            display: block;
        }
        .has-error .help-block {
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 login-container">
                <div class="login-panel">
                    <div class="login-header text-center">
                        <h3><i class="fa fa-lock"></i> User Login</h3>
                    </div>
                    <div class="login-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('client.login.submit') }}">
                            @csrf
                            
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email') }}" placeholder="Enter your email"  autofocus>
                                </div>
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter your password" >
                                </div>
                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-login">
                                    <i class="fa fa-sign-in"></i> Login
                                </button>
                            </div>
                            
                            {{-- <div class="text-center">
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div> --}}
                            
                            @if(Route::has('register'))
                            <div class="text-center" style="margin-top: 15px;">
                                Don't have an account? 
                                <a href="{{ route('client.register') }}">Register here</a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Bootstrap 3 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Custom JS for dismissing alerts -->
    <script>
        $(document).ready(function(){
            // Auto-dismiss alerts after 5 seconds
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 5000);
        });
    </script>
</body>
</html>