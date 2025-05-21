<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #f8f9fa;
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar p-3">
                <h5 class="mb-4">🛠 Admin Panel</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tasks.index') }}">All Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tasks.create') }}">Create Task</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mt-3">
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Header -->
                @isset($header)
                    <div class="bg-white p-3 shadow-sm mb-3">
                        <h4 class="mb-0">{{ $header }}</h4>
                    </div>
                @endisset

                <!-- Main Slot -->
                <main class="p-3">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
