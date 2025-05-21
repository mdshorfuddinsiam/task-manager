<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <!-- Bootstrap 3 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f8f8;
            padding-top: 50px;
        }
        
        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 51px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: block;
            padding: 20px;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #2c3e50;
            border-right: 1px solid #eee;
            width: 220px;
        }
        
        .sidebar .nav-sidebar {
            margin-right: -21px;
            margin-bottom: 20px;
            margin-left: -20px;
        }
        
        .sidebar .nav-sidebar > li > a {
            padding: 12px 20px;
            color: #b8c7ce;
        }
        
        .sidebar .nav-sidebar > li > a:hover,
        .sidebar .nav-sidebar > li > a:focus {
            color: #fff;
            background-color: #1a2226;
        }
        
        .sidebar .nav-sidebar > .active > a,
        .sidebar .nav-sidebar > .active > a:hover,
        .sidebar .nav-sidebar > .active > a:focus {
            color: #fff;
            background-color: #3c8dbc;
        }
        
        .sidebar .nav-sidebar .fa {
            margin-right: 10px;
        }
        
        /* Main content area */
        .main-content {
            padding: 20px;
            margin-left: 220px;
        }
        
        /* Header/navbar */
        .navbar-inverse {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }
        
        .navbar-inverse .navbar-brand {
            color: #fff;
        }
        
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }
        
        /* Dashboard cards */
        .dashboard-card {
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 15px;
        }
        
        .dashboard-card .card-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        
        .stat-box {
            text-align: center;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 15px;
            color: white;
        }
        
        .stat-box .stat-value {
            font-size: 24px;
            font-weight: bold;
        }
        
        .stat-box .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .bg-primary { background-color: #3c8dbc; }
        .bg-success { background-color: #00a65a; }
        .bg-info { background-color: #00c0ef; }
        .bg-warning { background-color: #f39c12; }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-bottom: 20px;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-dashboard"></i> Client Dashboard</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ auth('client')->user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li>
                                <a href="{{ route('client.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                                <form id="logout-form" method="POST" action="{{ route('client.logout') }}" style="display:none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('client.tasks.index') }}"><i class="fa fa-file-text"></i> Tasks</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main-content">
                
                @yield('content')
                
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Bootstrap 3 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            // Activate the sidebar menu item based on current page
            var url = window.location;
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
            
            // Highlight parent menu items when child is active
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parents('li').addClass('active');
        });
    </script>
</body>
</html>