<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('styles/admin-dashboard.css') }}">
    <script defer src="{{ asset('scripts/admin-dashboard.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('assets/logo.svg') }}" alt="Logo">
        </div>
        <ul class="menu">
            <li><span class="circle"></span> Dashboard</li>
            <li><span class="circle"></span> Station</li>
            <li class="employees-tab"><span class="circle"></span> Employees</li>
            <li><span class="circle"></span> Shifts</li>
            <li><span class="circle"></span> Edsr</li>
            <li><span class="circle"></span> Fuel Daily Sales</li>
            <li><span class="circle"></span> Cash to Bank</li>
        </ul>
        <hr class="separator">
        <div class="bottom-section">
            <ul>
                <li><span class="circle"></span> Notification</li>
            </ul>
            <div class="user-profile">
                <div class="profile-icon">U</div>
                <span>Vincent Lyimo</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="brown-line top"></div>
        <div class="scrollable-content" id="content-area">
            <h1>Welcome to Admin Panel</h1>
            <p>This section scrolls...</p>
        </div>

        <!-- ✅ Station Switcher Dropdown (Only for Client Admin with Multiple Stations) -->
        @if(auth()->check() && auth()->user()->role->name === 'Client Admin' && auth()->user()->stations()->count() > 1)
            <label for="stationSwitcher">Switch Station:</label>
            <select id="stationSwitcher">
                @foreach(auth()->user()->stations as $station)
                    <option value="{{ route('admin.dashboard', ['station_id' => $station->id]) }}">
                        {{ $station->station_name }}
                    </option>
                @endforeach
            </select>
        @endif

        <div class="brown-line bottom"></div>
    </div>
</div>

</body>
</html>
