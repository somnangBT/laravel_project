<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Netflix</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('https://bramptonist.com/wp-content/uploads/2018/06/netflix-image.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            background: rgba(0, 0, 0, 0.75); /* Semi-transparent black background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }
        .login-container h2 {
            font-weight: bold;
            color: #fff;
            text-align: center;
        }
        .form-label {
            color: #ddd; /* Light gray for labels */
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
        }
        .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #e50914; /* Netflix red */
            border-color: #e50914;
        }
        .btn-primary:hover {
            background-color: #f6121d;
            border-color: #f6121d;
        }
        .text-danger {
            color: #e87c03 !important; /* Netflix orange for error messages */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="mb-4">Sign In</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p>Dashboard</p>
        </div>
    </div>
</body>
</html>