<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>

            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </form>
    </div>
</body>
</html>
