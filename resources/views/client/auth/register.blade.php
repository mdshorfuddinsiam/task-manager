<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    
    <!-- Bootstrap 3 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f8f8;
        }
        .register-container {
            margin-top: 50px;
        }
        .register-panel {
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            border-radius: 4px;
        }
        .register-header {
            background-color: #5cb85c;
            color: white;
            padding: 15px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .register-body {
            padding: 20px;
            background: white;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-register {
            background-color: #5cb85c;
            border: none;
            padding: 10px;
        }
        .btn-register:hover {
            background-color: #449d44;
        }
        .login-link {
            margin-top: 15px;
            display: block;
            text-align: center;
        }
        .has-error .help-block {
            color: #a94442;
        }
        .password-strength {
            margin-top: 5px;
            height: 5px;
            background: #eee;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background: transparent;
            transition: width 0.3s, background 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 register-container">
                <div class="register-panel">
                    <div class="register-header text-center">
                        <h3><i class="fa fa-user-plus"></i> Create Account</h3>
                    </div>
                    <div class="register-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('success') }}
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

                        <form method="POST" action="{{ route('client.register.submit') }}" id="registerForm">
                            @csrf
                            
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="{{ old('name') }}" placeholder="Enter your full name"  autofocus>
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email') }}" placeholder="Enter your email" >
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
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Create password" >
                                </div>
                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation" 
                                           name="password_confirmation" placeholder="Confirm your password" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btn-register">
                                    <i class="fa fa-check-circle"></i> Register
                                </button>
                            </div>
                            
                            <div class="text-center login-link">
                                Already have an account? 
                                <a href="{{ route('client.login') }}">Login here</a>
                            </div>
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
    

</body>
</html>