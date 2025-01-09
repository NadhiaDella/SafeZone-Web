<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Register</h2>

            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Register</button>

            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </form>
    </div>
</body>
</html>
