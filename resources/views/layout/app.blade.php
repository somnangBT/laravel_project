<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f7fb; /* Light background */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #1892cf; /* Dark navbar */
        }

        .navbar .nav-link {
            color: #fff !important; /* White text for links */
        }

        .navbar .nav-link:hover {
            color: #f8d7da !important; /* Light red on hover */
        }

        .navbar-brand {
            font-weight: bold;
            color: #e50914 !important; /* Netflix red */
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 40px; /* Adjust logo height */
            margin-right: 10px; /* Add spacing between logo and text */
        }

        /* Dashboard Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #eceef1;
            padding-top: 20px;
        }

        .sidebar .nav-item {
            padding: 10px 15px;
        }

        .sidebar .nav-item a {
            color: #0c0c0c;
            font-size: 18px;
            text-decoration: none;
        }

        .sidebar .nav-item a:hover {
            background-color: #495057;
            color: #e50914;
        }

        /* Students Dropdown */
        .dropdown-menu {
            display: none;
            background-color: #f4f6f8;
        }

        .dropdown-menu a {
            color: #fff;
        }

        .dropdown-menu a:hover {
            background-color: #eef1f5;
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .footer a {
            color: #e50914;
            text-decoration: none;
        }

        .footer a:hover {
            color: #f6121d;
        }
    </style>
    <style>
    /* ...existing code... */

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 250px;
        background-color: #eceef1;
        padding-top: 20px;
        z-index: 1030; /* Make sure it's above other content */
        overflow-y: auto;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
        min-height: 100vh;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 250px;
    background: linear-gradient(135deg, #1892cf 60%, #4bc0c0 100%);
    padding-top: 30px;
    z-index: 1030;
    overflow-y: auto;
    box-shadow: 2px 0 8px rgba(0,0,0,0.05);
}

.sidebar .nav-link {
    color: #fff !important;
    font-size: 18px;
    border-radius: 25px;
    padding: 12px 20px;
    margin-bottom: 8px;
    transition: background 0.2s, color 0.2s;
    display: flex;
    align-items: center;
}

.sidebar .nav-link.active,
.sidebar .nav-link:hover {
    background: #fff;
    color: #5fd2f9 !important;
    font-weight: bold;
}

.sidebar .dropdown-menu {
    background: #f4f6f8;
    border-radius: 10px;
    margin-left: 10px;
}

.sidebar .dropdown-item {
    color: #050708;
    font-size: 16px;
    border-radius: 10px;
}

.sidebar .dropdown-item:hover {
    background: #e3f2fd;
    color: #0d6efd;
}
</style>
</head>

<body>
    <!-- Sidebar -->
   <!-- filepath: c:\xampp\htdocs\week1\resources\views\layout\app.blade.php -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link{{ request()->is('home') ? ' active' : '' }}" href="{{ url('home') }}">
                <i class="bi bi-house-door"></i> <span class="ms-2">Home</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link{{ request()->is('post/index') ? ' active' : '' }}" href="{{ url('post/index') }}">
                <i class="bi bi-file-earmark-post"></i> <span class="ms-2">Teachers</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('post.progress') }}" class="nav-link{{ request()->routeIs('post.progress') ? ' active' : '' }}">
                <i class="bi bi-bar-chart"></i> <span class="ms-2">Teacher Progress</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link{{ request()->routeIs('students.progress') ? ' active' : '' }}" href="{{ route('students.progress') }}">
                <i class="bi bi-person-check"></i> <span class="ms-2">Progress</span>
            </a>
        </li>
        <!-- filepath: c:\xampp\htdocs\week1\resources\views\layout\app.blade.php -->
<li class="nav-item mb-2">
    <a class="nav-link{{ request()->routeIs('classtecher.index') ? ' active' : '' }}" href="{{ route('classtecher.index') }}">
        <i class="bi bi-mortarboard"></i> <span class="ms-2">Teacher's Class</span>
    </a>
</li>
        <li class="nav-item dropdown mb-2" id="studentsDropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i> <span class="ms-2">Students</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ url('/students') }}"><i class="bi bi-person-lines-fill"></i> All Students</a></li>
                <li><a class="dropdown-item" href="{{ url('/students/create') }}"><i class="bi bi-person-plus-fill"></i> Add Student</a></li>
                <li><a class="dropdown-item" href="{{ url('/subjects') }}"><i class="bi bi-bookmark-plus"></i> Subjects</a></li>
            </ul>
        </li>
    </ul>
</div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <i class="bi bi-app"></i> My Laravel App
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            @yield('content') <!-- Content from child templates will be injected here -->
        </div>
    </div>

    <!-- Footer -->
    {{-- <footer class="footer">
        <p>&copy; {{ date('Y') }} MyApp. All rights reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
        </p>
    </footer> --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // JavaScript to toggle the dropdown on click
        document.querySelector('#studentsDropdown').addEventListener('click', function() {
            this.classList.toggle('show');
        });
    </script>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</html>
