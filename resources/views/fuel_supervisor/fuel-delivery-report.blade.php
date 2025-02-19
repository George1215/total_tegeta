<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Delivery Report</title>
    <link rel="stylesheet" href="styles/fuel-delivery.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="assets/logo.svg" alt="Logo">
        </div>
        <div class="profile">
            <div class="profile-icon">U</div>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <h2>Fuel Delivery Report</h2>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Table Section -->
        <div class="main-table-section">
            <table class="delivery-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        <th>Ewura Levy</th>
                        <th>Net Amount</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr>
                        <td><input type="text" placeholder="Date"></td>
                        <td><input type="text" placeholder="Description"></td>
                        <td><input type="number" placeholder="Quantity"></td>
                        <td><input type="text" placeholder="Unit"></td>
                        <td><input type="number" placeholder="Unit Price"></td>
                        <td><input type="number" placeholder="Amount"></td>
                        <td><input type="number" placeholder="Ewura Levy"></td>
                        <td><input type="number" placeholder="Net Amount"></td>
                    </tr>
                </tbody>
            </table>
            <button class="add-row-btn" onclick="addRow()">+ Add Row</button>
        </div>

        <!-- Invoice and Summary Section -->
        <div class="side-section">
            <div class="invoice-section">
                <table>
                    <tr>
                        <th>Invoice</th>
                        <td><input type="text" placeholder="Invoice"></td>
                    </tr>
                    <tr>
                        <th>Delivery Note</th>
                        <td><input type="text" placeholder="Delivery Note"></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><input type="date"></td>
                    </tr>
                </table>
            </div>

            <div class="summary-section">
                <table>
                    <tr>
                        <th>Net Value</th>
                        <td><input type="number" placeholder="Net Value"></td>
                    </tr>
                    <tr>
                        <th>Transport Charges</th>
                        <td><input type="number" placeholder="Transport Charges"></td>
                    </tr>
                    <tr>
                        <th>VAT on Transport</th>
                        <td><input type="number" placeholder="VAT on Transport"></td>
                    </tr>
                    <tr>
                        <th>Amount Due (TZS)</th>
                        <td><input type="number" placeholder="Amount Due"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="submit-section">
        <button class="submit-btn">Submit</button>
    </div>

    <script src="scripts/fuel-delivery.js"></script>
</body>
</html>
