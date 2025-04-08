<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Contact Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .header {
            background-color: #4d328c;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
            border-radius: 5px;
        }
        .table-container {
            margin-top: 30px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="header">User Contact Messages</div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Amit Patel</td>
                        <td>amit.patel@example.com</td>
                        <td>Need information about library hours.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Priya Sharma</td>
                        <td>priya.sharma@example.com</td>
                        <td>How can I renew my borrowed book?</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Rohan Mehta</td>
                        <td>rohan.mehta@example.com</td>
                        <td>My account login is not working.</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Neha Verma</td>
                        <td>neha.verma@example.com</td>
                        <td>Can I reserve a book online?</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Arjun Singh</td>
                        <td>arjun.singh@example.com</td>
                        <td>Do you have a book on Python programming?</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="btn-container text-start">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2 "></i><strong>Back</strong>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
