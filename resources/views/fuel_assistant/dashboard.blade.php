<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Supervisor Assistant Dashboard</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>
<body>
    <h1>Welcome, Fuel Supervisor Assistant</h1>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-button">Logout</button>
</form>

</body>
</html>
