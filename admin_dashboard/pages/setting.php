<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings - Configuration</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .section-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: black;
            margin-bottom: 15px;
        }
        .btn-custom {
            width: 100%;
        }
        .form-control, .form-select {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container py-4" >
    <h2 class="text-center text-white  py-3" style="background-color: #7d01a3 ;">Settings</h2>

    <div class=" container py-3 -center">
        <div class="section-container">
            <!-- Library Settings Section -->
            <h4 class="container py-2 bg-dark text-white text-center"> Library Settings</h4>
            <form>
                <div class="mb-3">
                    <label class="form-label">Library Operating Hours</label>
                    <input type="text" class="form-control" placeholder="e.g., 9 AM - 8 PM" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Max Books per User</label>
                    <input type="number" class="form-control" placeholder="Enter limit" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Borrowing Period (Days)</label>
                    <input type="number" class="form-control" placeholder="e.g., 14" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fine per Overdue Day (₹)</label>
                    <input type="number" class="form-control" placeholder="e.g., 5" required>
                </div>
                <button type="submit" class="btn btn-secondary btn-custom">Save Library Settings</button>
            </form>
        </div>
    </div>

    <div class="container py-3 -center">
        <div class="section-container">
            <!-- Email Settings Section -->
            <h4 class="container py-2 bg-dark text-white text-center"> Email Settings</h5>
            <form>
                <div class="mb-3">
                    <label class="form-label">Overdue Fine Email Template</label>
                    <textarea class="form-control" rows="4" placeholder="Write the email template for overdue fines"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Book Availability Email Template</label>
                    <textarea class="form-control" rows="4" placeholder="Write the email template for book availability"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary btn-custom">Save Email Settings</button>
            </form>
        </div>
    </div>

    <div class="container py-3 -center">
        <div class="section-container">
            <!-- System Alerts Section -->
            <h4 class="container py-2 bg-dark text-white text-center"> System Alerts</h5>
            <form>
                <div class="mb-3">
                    <label class="form-label">Enable Low Stock Alerts</label>
                    <select class="form-select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Set Low Stock Threshold (Books)</label>
                    <input type="number" class="form-control" placeholder="e.g., 5" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Enable User Complaints Alerts</label>
                    <select class="form-select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary btn-custom">Save System Alerts</button>
            </form>
        </div>
    </div>

    <!-- Back Button - Aligned Right -->
    <div class="container py-3 -center">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
