<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pump Attendant Dashboard</title>
    <link rel="stylesheet" href="{{ asset('styles/attendant.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
<!-- Navbar -->
<div class="navbar">
    <div class="logo">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo">
    </div>
    <div class="navbar-right">
        <div class="profile-rank">
            <span class="rank-label">Monthly rank</span>
            <div class="rank-icon">
                <span>7</span> <!-- Rank number -->
                <i class="star-icon">★</i> <!-- Star icon -->
            </div>
        </div>
        <div class="profile">
            <span>Welcome, Jane,</span>
            <div class="profile-icon">U</div>
            <div class="dropdown-menu">
                <ul>
                    <li><i class="fas fa-clock"></i> View Shifts</li>
                    <li><i class="fas fa-sign-out-alt"></i> Logout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Header Section -->
<div class="header">
<button class="btn">Shift paper</button>
<button class="btn">Pending papers</button>
    <button class="btn">Time Table</button>
</div>


    <!-- Main Content -->
    <div class="content">
        <!-- First Table: General Details -->
        <div class="table-container">
    <!-- Vertical Table -->
     <div class="firsttablebackground">
        <table class="vertical-table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Date</td>
                    <td>12/12/1212</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>User</td>
                </tr>
                <tr>
                    <td>Shift</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Pump No</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Sides No</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Horizontal Table -->
    <div class="secondtablebackground">
    <table class="horizontal-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Closing Meter</th>
                <th>Opening Meter</th>
                <th>THR/PUT</th>
                <th>RT/TANK</th>
                <th>Sales</th>
                <th>Unit Price</th>
                <th>Amount in Cash</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MSP</td>
                <td>602099689</td>
                <td>602099689</td>
                <td>674.81</td>
                <td>12</td>
                <td>674.81</td>
                <td>2793</td>
                <td>65464564546</td>
            </tr>

            <tr>
                <td>MSP</td>
                <td>602099689</td>
                <td>602099689</td>
                <td>674.81</td>
                <td>12</td>
                <td>674.81</td>
                <td>2793</td>
                <td>65464564546</td>
            </tr>

            <tr>
                <td>AGO</td>
                <td>602099689</td>
                <td>602099689</td>
                <td>674.81</td>
                <td>12</td>
                <td>674.81</td>
                <td>2793</td>
                <td>65464564546</td>
            </tr>

            <tr>
                <td>AGO</td>
                <td>602099689</td>
                <td>602099689</td>
                <td>674.81</td>
                <td>12</td>
                <td>674.81</td>
                <td>2793</td>
                <td>65464564546</td>
            </tr>
        </tbody>
    </table>
</div>
</div>


        <!-- Second Section: Card Sales -->
        <div class="card-sales">
            <div class="super-top">
                <div class="shifttitles">
                    <div class="title-container">
                         <h4>Super Top Card Sales</h4>
                        <button class="add-card-row"> Add Row</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Receipt No</th>
                            <th>Amount</th>
                            <th>Litre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1058</td>
                            <td>44688</td>
                            <td>16.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="diesel-top">
            <div class="shifttitles">
            <div class="title-container">
                <h4>Diesel Top Card Sales</h4>
                <button class="add-card-row"> Add Row</button>
</div>
</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Receipt No</th>
                            <th>Amount</th>
                            <th>Litre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1056</td>
                            <td>20000</td>
                            <td>7.16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Third Section: Payment Methods -->
         <div class="lowerTables">
        <div class="fifthtablebackground">
            <div class="payment-methods">
            <div class="shifttitles">
            <div class="title-container">
                <h4>Payment Breakdown</h4>
                <button class="row-btn">Add Row</button>
</div>
</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Payment Method</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>POST</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cash</td>
                            <td>500,000/=</td>
                        </tr>
                        <tr>
                            <td>Mpesa/Yas/Airtel</td>
                            <td><button>+</button></td>
                        </tr>
                        <tr>
                            <td>CRDB</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <!-- Summary Table Section -->
        <div class="sixtablebackground">
<div class="summary-table">
    <h4>Summary Table</h4>
    <table class="summary-details">
        <tbody>
            <tr>
                <td>Total Credit Sales Amount</td>
                <td>745646546</td>
            </tr>
            <tr>
                <td>Total Expenses</td>
                <td>745646546</td>
            </tr>
            <tr>
                <td>Total Cash Amount</td>
                <td>745646546</td>
            </tr>
            <tr>
                <td>Cash Deposit</td>
                <td>745646546</td>
            </tr>
            <tr>
                <td>Balance</td>
                <td>745939343454546</td>
            </tr>
            <tr>
                <td>Pump Attendants Sign</td>
                <td>Fatuma mushi</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>

        <!-- Submit Section -->
        <div class="submit-section">
            <button class="submit-btn">Submit</button>
        </div>
    </div>

    <script src="{{ asset('scripts/attendant.js') }}"></script>
</body>
</html>
