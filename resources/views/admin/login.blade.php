<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2A332E;
            color: #FBFADA;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #1E2623;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .form-control {
            background-color: #2A332E;
            color: #FBFADA;
            border: 1px solid #FBFADA;
        }
        .form-control:focus {
            background-color: #2A332E;
            color: #FBFADA;
            border-color: #FBFADA;
            box-shadow: none;
        }
        .btn-login {
            background-color: #FBFADA;
            color: #2A332E;
            border: none;
        }
        .btn-login:hover {
            background-color: #E4D8A5;
            color: #2A332E;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <h3 class="mb-4">Admin Login</h3>
        <form action="/admin/login" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
    </div>
</body>
</html>