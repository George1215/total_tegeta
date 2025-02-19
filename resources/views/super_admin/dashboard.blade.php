<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('styles/admin-dashboard.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Super Admin</h1>
        <p>This is the Super Admin Dashboard.</p>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</body>
</html>
