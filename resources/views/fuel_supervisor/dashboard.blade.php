<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Supervisor Dashboard</title>
    <link rel="stylesheet" href="styles/fuelsupervisor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="assets/logo.svg" alt="Logo">
        </div>
        <div class="navbar-right">
            <div class="profile">
                <div class="profile-icon">U</div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h2>Welcome to your Dashboard, Jaro,</h2>
        <div class="action-buttons">
            <button class="btn" onclick="window.location.href='{{ route('fuel.delivery.report') }}'">Delivery report</button>
            <button class="btn">View reports</button>
            <button class="btn">Shift Time Table</button>
        </div>
    </div>

    <!-- Fuel Gauges -->
    <div class="gauge-container-row">
        <div class="gauge-box">
            <div class="gauge">
                <div class="gauge-fill" id="gauge-fill"></div>
                <div class="gauge-cover" id="gauge-cover">5%</div>
            </div>
            <p>AGO: 20,000L</p>
        </div>

        <div class="gauge-box">
            <div class="gauge">
                <div class="gauge-fill" id="gauge-fill-2"></div>
                <div class="gauge-cover" id="gauge-cover-2">50%</div>
            </div>
            <p>MSP: 15,000L</p>
        </div>
    </div>




    <!-- Tables Section -->
    <div class="tables-section">
        <!-- Actual Closing Stock -->
        <h4>Actual closing stock</h4>
        <table class="stock-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>10/02/2025</th>
                    <th>11/02/2025</th>
                    <th>12/02/2025</th>
                    <th>13/02/2025</th>
                    <th>14/02/2025</th>
                    <th>15/02/2025</th>
                    <th>16/02/2025</th>
                    <th>17/02/2025</th>
                    <th>18/02/2025</th>
                    <th>19/02/2025</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MSP</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                </tr>
                <tr>
                    <td>AGO</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                    <td>34534</td>
                </tr>
            </tbody>
        </table>

        <!-- Theoretical Closing Stock -->
        <h4>Theoretical closing stock</h4>
        <table class="stock-table">
            <thead>
                <tr>
                <th>Date</th>
                    <th>10/02/2025</th>
                    <th>11/02/2025</th>
                    <th>12/02/2025</th>
                    <th>13/02/2025</th>
                    <th>14/02/2025</th>
                    <th>15/02/2025</th>
                    <th>16/02/2025</th>
                    <th>17/02/2025</th>
                    <th>18/02/2025</th>
                    <th>19/02/2025</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MSP</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                </tr>
                <tr>
                    <td>AGO</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                    <td>43787</td>
                </tr>
            </tbody>
        </table>

        <!-- Gain/Loss -->
        <h4>Gain/Loss</h4>
        <table class="stock-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>10/02/2025</th>
                    <th>11/02/2025</th>
                    <th>12/02/2025</th>
                    <th>13/02/2025</th>
                    <th>14/02/2025</th>
                    <th>15/02/2025</th>
                    <th>16/02/2025</th>
                    <th>17/02/2025</th>
                    <th>18/02/2025</th>
                    <th>19/02/2025</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MSP</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>AGO</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="scripts/gauge.js"></script>
</body>
</html>
