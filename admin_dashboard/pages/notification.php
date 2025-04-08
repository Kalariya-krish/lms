<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications & Alerts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table thead {
            background-color: #6a1b9a;
            color: white;
        }
        .badge {
            font-size: 14px;
        }
        .btn-sm {
            padding: 5px 10px;
        }
        .nav-link i{
            margin-right: 10px;
            margin-top: 20px;
        }   
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center text-white  py-3" style="background-color: #7d01a3 ;"> Notifications & Alerts</h2>

    <!-- Send Bulk Notifications -->
    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            <h5>Send Bulk Notifications</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="notificationType" class="form-label">Select Notification Type:</label>
                    <select class="form-select" id="notificationType">
                        <option>Book Availability</option>
                        <option>Overdue Fines</option>
                        <option>General Announcement</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Enter notification message..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Notification</button>
            </form>
        </div>
    </div>

    <!-- View Notification History -->
    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            <h5>Notification History</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Notification Type</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-02-05</td>
                            <td>Book Availability</td>
                            <td>"Atomic Habits is now available for borrowing."</td>
                            <td><span class="badge bg-success">Sent</span></td>
                        </tr>
                        <tr>
                            <td>2025-02-04</td>
                            <td>Overdue Fine</td>
                            <td>"Reminder: You have a pending fine of ₹50. Pay it soon."</td>
                            <td><span class="badge bg-danger">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Automated Alerts -->
    <div class="card mt-4">
        <div class="card-header bg-dark text-dark">
            <h5>Automated Alerts</h5>
        </div>
        <div class="card-body">
            <p>⚠ **System-generated alerts** are automatically sent for:</p>
            <ul class="list-group">
                <li class="list-group-item"> **Upcoming Due Dates:** Users are reminded to return books before the due date.</li>
                <li class="list-group-item"> **Overdue Fines:** Automatic reminders for unpaid fines.</li>
                <li class="list-group-item"> **Reserved Book Availability:** Notify users when reserved books are available.</li>
            </ul>
        </div>
    </div>
    <div class="container py-3 -center">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
