<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Notifications</title>

    <!-- Bootstrap for Layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Notification Page Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            font-weight: 700;
            color: #343a40;
        }

        .notification-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .notification {
            display: flex;
            align-items: flex-start;
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            gap: 15px;
        }

        .notification:last-child {
            border-bottom: none;
        }

        .icon {
            font-size: 24px;
            color: black;
        }

        .details h5 {
            margin: 0;
            font-size: 18px;
            color: #343a40;
        }

        .details p {
            margin: 4px 0 6px;
            font-size: 14px;
            color: #6c757d;
        }

        .details small {
            color: #adb5bd;
        }
        .btn i{
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse">

            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-left text-white bg-dark mb-4 ">Notifications</h1>
        <div class="notification-container">
            <div class="notification">
                <span class="icon"><i class="fa-solid fa-book"></i></span>
                <div class="details">
                    <h5>Book Reserved Available!</h5>
                    <p>The book "Artificial Intelligence: A Modern Approach" is now available for pickup.</p>
                    <small>2 hours ago</small>
                </div>
            </div>
            <div class="notification">
                <span class="icon"><i class="fa-solid fa-clock"></i></span>
                <div class="details">
                    <h5>Due Date Reminder</h5>
                    <p>Your borrowed book "Data Structures & Algorithms" is due in 3 days. Please return or renew it.</p>
                    <small>1 day ago</small>
                </div>
            </div>
            <div class="notification">
                <span class="icon"><i class="fa-solid fa-exclamation-triangle"></i></span>
                <div class="details">
                    <h5>Overdue Alert!</h5>
                    <p>You have an overdue fine for "Computer Networks". Please clear it as soon as possible.</p>
                    <small>5 days ago</small>
                </div>
            </div>
        </div>
         <!-- Back Button - Aligned Right -->
    <div class="container py-3 -center">
        <a href="../user_dashboard/userdashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>
    </div>


</body>

</html>