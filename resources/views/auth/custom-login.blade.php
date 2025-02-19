<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Energies Tegeta</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <!-- Left section with the image -->
        <div style="background-image: url('{{ asset('assets/images/totalenergies.jpg') }}'); width: 50%; height: auto; background-size: cover; background-position: center;"></div>

        <!-- Right section with the form -->
        <div class="form-section">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Total Energies Logo" style="width: 100px;">
            <h1>Total Energies Tegeta</h1>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="text" name="email" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <a href="#">Forgot password</a>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
